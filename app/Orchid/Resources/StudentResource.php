<?php

namespace App\Orchid\Resources;

use App\Models\Branch;
use App\Models\Source;
use App\Models\Student;
use App\Models\User;
use App\Orchid\Actions\CustomAction;
use App\Orchid\Filters\WithTrashed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

class StudentResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Student::class;

    public $branch_user;

    public function __construct()
    {
        $this->branch_user = Auth::user()->branch_id ? true : false;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make('name')
                    ->title('Ismi')
                    ->required()
                    ->placeholder('Talabaning ismi kiritiladi')
                    ->help('To`ldirish majburiy'),
                Input::make('surname')
                    ->title('Familiyasi')
                    ->placeholder('Talabaning familiyasi kiritiladi'),
                Input::make('lastname')
                    ->title('Otasining ismi')
                    ->placeholder('Talabaning otasin ismi kiritiladi'),
            ]),
            Group::make([
                Input::make('phone')
                    ->title('Talabaning telefon raqami')
                    ->mask('(99) 999-99-99')
                    ->placeholder('Talabaning telefon raqami kiritiladi'),
                Input::make('birthday')
                    ->type('date')
                    ->title('Talabaning tug`ilgan kun sanasi'),
                Input::make('tg_username')
                    ->title('Telegram username')
                    ->placeholder('Talabaning telegram username kiritiladi')
                    ->help('Masalan: https://t.me/student_username dagi student_username kirtiladi'),
            ]),
            Group::make([
                Input::make('address')
                    ->title('Manzil')
                    ->placeholder('Talabaning yashash manzili kiritiladi'),
                Input::make('parent_phone')
                    ->title('Talabaning otasi yoki onasi raqami')
                    ->mask('(99) 999-99-99')
                    ->placeholder('Talabaning telefon raqami kiritiladi'),
            ]),
            Group::make([
                Relation::make('source_id')
                    ->fromModel(Source::class, 'name')
                    ->title('Talabani jalb qilgan hamkor')
                    ->required()
                    ->help('To`ldirish majburiy'),
                Input::make('come_date')
                    ->type('date')
                    ->title('Talabaning kelgan vaqti')
                    ->value(date('Y-m-d'))
                    ->required()
                    ->help('To`ldirish majburiy'),
            ]),
            Group::make([
                Select::make('branch_id')->fromModel(Branch::class, 'name')
                    ->value(Auth::user()->branch_id)->title('Filialni tanlang')->canSee(!$this->branch_user),
                Select::make('status')->options(Student::STATUS)->title('Talim bosqichi')
                    ->help('To`ldirish majburiy')
                    ->required()->canSee(Auth::user()->hasAccess('platform.editStudentStatus')),
                CheckBox::make('privilege')
                    ->title('Saxovat talabasimi?')
                    ->sendTrueOrFalse()->vertical(),
            ]),
            Group::make([
                TextArea::make('comment')->title('Talaba uchun izoh'),
                TextArea::make('hobbies')->title('Talabaning qizishlari (Hobbiy)'),
            ]),
            Input::make('registered_id')
                ->type('hidden')
                ->value(Auth::id()),
            Input::make('branch_id')->type('hidden')->value(Auth::user()->branch_id)->required()->canSee($this->branch_user),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id')->sort(),
            TD::make('name', 'Ismi')->filter(Input::make()->title('Ismi'))
                ->render(function ($model) {
                    return Link::make($model->name)->route('platform.addStudentToGroup', ['student' => $model->id]);
                })->cantHide(),
            TD::make('surname', 'Familiyasi')->filter(Input::make()->title('Familiyasi'))->defaultHidden(),
            TD::make('lastname', 'Otasining ismi')->filter(Input::make()->title('Otasining ismi'))->defaultHidden(),
            TD::make('phone', 'Telefon raqam')->filter(Input::make()->mask('(99) 999-99-99')->title('Telefon raqami'))
                ->render(function ($model) {
                    return Link::make($model->phone)->href('tel:' . Student::telephone($model->phone));
                })->defaultHidden(),
            TD::make('birthday', 'Tug`ilgan kun')->filter(Input::make()->type('date')->title('Tug`gan kuni'))->defaultHidden(),
            TD::make('tg_username', 'Telegram')->filter(Input::make()->title('Telegram'))
                ->render(function ($model) {
                    return Link::make($model->tg_username)->href('https://t.me/' . $model->tg_username)->target('_blank');
                })->defaultHidden(),
            TD::make('parent_phone', 'Ota Ona raqami')->filter(Input::make()->type('number')->mask('(99) 999-99-99')->title('Ota Ona raqami'))
                ->render(function ($model) {
                    return Link::make($model->parent_phone)->href('tel:' . Student::telephone($model->parent_phone));
                })->defaultHidden(),
            TD::make('balance', 'Hisob')->render(function ($model) {
                return Button::make(number_format($model->balance))->method('none')->type(Color::SUCCESS())
                    ->canSee($model->balance > 0)->disabled();
            })->sort()->cantHide(),
            TD::make('debt', 'Qarz')->render(function ($model) {
                return Button::make(number_format($model->debt))->type(Color::DANGER())->canSee($model->debt > 0)->disabled();
            })->sort()->cantHide(),
            TD::make('discount', 'Chegirma')->render(function ($model) {
                return Button::make(number_format($model->discount))->type(Color::INFO())->canSee($model->discount > 0)->disabled();
            })->sort(),
            TD::make('privilege', 'Saxovat')->render(function ($model) {
                    return Link::make('')->icon('star')->type(Color::WARNING())->canSee($model->privilege);
                })->sort()->filter(CheckBox::make()->title('Saxovat talabasi')->sendTrueOrFalse())->cantHide(),
            TD::make('status', 'Talim bosqichi')->render(function ($model) {
                    return  Student::STATUS[$model->status];
                })->filter(Select::make('status')->options(Student::STATUS))->cantHide(),
            TD::make('source_id', 'Hamkor')->render(function ($model) {
                    return $model->source->name;
                })->filter(Relation::make()->fromModel(Source::class, 'name'))->cantHide(),
            TD::make('address', 'Manzil')->filter(Input::make()->title('Manzil'))->defaultHidden(),
            TD::make('registered_id', 'Ro`yhatga oluvchi')
                ->render(function ($model) {
                    return $model->registered->name;
                })->filter(Relation::make()->fromModel(User::class, 'name'))->defaultHidden(),
            TD::make('come_date', 'Kelgan sanasi')->filter(Input::make()->type('date')->title('Tug`gan kuni'))
                ->sort()->defaultHidden(),
            TD::make('branch_id', 'Filial')->filter(Relation::make('branch_id')->fromModel(Branch::class, 'name'))
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user)->cantHide(),
            TD::make('created_at', 'Kiritilgan sana')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                })->defaultHidden(),

            TD::make('updated_at', 'O`zgertirilgan sana')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                })->sort()->defaultHidden(),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id', 'ID'),
            Sight::make('status', 'Talim bosqichi')
                ->render(function ($model) {
                    return Student::STATUS[$model->status];
                }),
            Sight::make('name', 'Ismi'),
            Sight::make('surname', 'Familiyasi'),
            Sight::make('lastname', 'Otasining ismi'),
            Sight::make('phone', 'Telefon raqami')
                ->render(function ($model) {
                    return Link::make($model->phone)->href('tel:' . Student::telephone($model->phone));
                }),
            Sight::make('birthday', 'Tug`ilgan kuni'),
            Sight::make('address', 'Manzili'),
            Sight::make('tg_username', 'Telegram username')
                ->render(function ($model) {
                    return Link::make($model->tg_username)->href('https://t.me/' . $model->tg_username)->target('_blank');
                }),
            Sight::make('parent_phone', 'Ota Ona raqami')
                ->render(function ($model) {
                    return Link::make($model->parent_phone)->href('tel:' . Student::telephone($model->parent_phone));
                }),
            Sight::make('come_date', 'Kelgan sanasi'),
            Sight::make('balance', 'Hisob'),
            Sight::make('debt', 'Qarz'),
            Sight::make('source_id', 'Hamkor')->render(function ($model) {
                return $model->source->name;
            }),
            Sight::make('branch_id', 'Filial')
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
            Sight::make('registered_id', 'Ro`yhatga oluvchi')->render(function ($model) {
                return $model->registered->name;
            }),
            Sight::make('created_at', 'Kiritilgan sana')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('updated_at','O`zgertirilgan sana')->render(function ($model) {
                return $model->updated_at->toDateTimeString();
            }),
            Sight::make('comment', 'Izoh'),
            Sight::make('hobbies', 'Qizishlari'),
        ];
    }


    public function with(): array
    {
        return ['branch', 'source', 'registered'];
    }

    public function filters(): array
    {
        return [
            new DefaultSorted('id', 'desc'),
            WithTrashed::class,
        ];
    }

    public function actions(): array
    {
        return [

        ];
    }

    public function none()
    {

    }

    public function rules(Model $model): array
    {
        return [
            'name' => ['required'],
            'address' => ['required'],
            'source_id' => ['required'],
            'branch_id' => ['required'],
            'registered_id' => ['required'],
            'come_date' => ['required'],
            'privilege' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Talabaning ismi kiritilishi shart',
            'address.required' => 'Talabaning manzili kiritilishi shart',
            'source_id.required' => 'Talabaning jalb qilgan hamkor kiritilishi shart',
            'branch_id.required' => 'Talabaning o`quv filiali kiritilishi shart',
            'registered_id.required' => 'Talabaning royhatga olgan odam kiritilishi shart',
            'come_date.required' => 'Talabaning kelgan vaqti kiritilishi shart',
            'privilege.required' => 'Talabaning imtiyozi kiritilishi shart',
        ];
    }

    public static function icon(): string
    {
        return 'graduation';
    }

    public static function perPage(): int
    {
        return 15;
    }

    public static function permission(): ?string
    {
        return 'platform.students';
    }

    public static function label(): string
    {
        return 'Talabalar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining talabalari ro`yhati';
    }

    public static function singularLabel(): string
    {
        return 'Talaba';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi talaba qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi talaba qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'Talaba malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'Talabani o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'Talaba o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'Talabani qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'Talaba malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi talaba';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'Talabani o`zgartirish';
    }

    public static function emptyResourceForAction(): string
    {
        return 'Bu amallarni bajarish uchun malumotlar mavjud emas';
    }

    public function modelQuery(ResourceRequest $request, Model $model): Builder
    {
        return $model->query()->when($this->branch_user, function ($query) {
            return $query->where('branch_id', Auth::user()->branch_id);
        });
    }

    public function paginationQuery(ResourceRequest $request, Model $model): Builder
    {
        return $model->query()->when($this->branch_user, function ($query) {
            return $query->where('branch_id', Auth::user()->branch_id);
        });
    }


    public function onSave(ResourceRequest $request, Model $model)
    {
        if ($request->status == 'finished' && $model->groups()->count())
        {
            Alert::error('Oldin talabani u azo bolgan barcha guruxlardan chiqarish kerak!');
        } else {
            $model->forceFill($request->all())->save();
        }
    }

    /**
     * Action to delete a model
     *
     * @param Model $model
     *
     * @throws Exception
     */
    public function onDelete(Model $model)
    {
        if ($model->groups()->count())
        {
            Alert::error('Oldin talabani u azo bolgan barcha guruxlardan chiqarish kerak!');
        } else {
            $model->delete();
        }
    }
}
