<?php

namespace App\Orchid\Resources;

use App\Models\Branch;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Teacher;
use App\Orchid\Filters\WithTrashed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;

class GroupResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Group::class;

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
            \Orchid\Screen\Fields\Group::make([
                Input::make('name')
                    ->title('Gurux nomi')
                    ->required()
                    ->placeholder('Gurux nomini kiriting'),
                Select::make('subject_id')
                    ->title('Fan')
                    ->fromQuery(Subject::where('branch_id', '=', Auth::user()->branch_id), 'name')
                    ->required(),
                Select::make('day_type')
                    ->title('Dars kunlari')
                    ->options(Group::DAY_TYPE)
                    ->required(),
            ]),
            \Orchid\Screen\Fields\Group::make([
                Select::make('teacher_id')
                    ->title('O\'qituvchi')
                    ->fromQuery(Teacher::query()->where('branch_id', '=', Auth::user()->branch_id), 'name')
                    ->required(),
                Select::make('branch_id')->fromModel(Branch::class, 'name')
                    ->value(Auth::user()->branch_id)->title('Filialni tanlang')->canSee(!$this->branch_user),
                CheckBox::make('is_active')->title('Aktiv')
                    ->sendTrueOrFalse()->value(true)->help('Guruxning xozirgi paytdagi aktivligi'),
                Input::make('branch_id')->type('hidden')->value(Auth::user()->branch_id)->required()->canSee($this->branch_user),
            ]),
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
            TD::make('id'),
            TD::make('name', 'Nomi')->filter(Input::make()->title('Nomi'))
                ->render(function ($model) {
                    return Link::make($model->name)->route('platform.groupInfo', ['group' => $model->id]);
                })->cantHide(),
            TD::make('subject_id', 'Fan')
                ->render(function ($model) {
                    return $model->subject->name;
                })->filter(Select::make()->fromQuery(Subject::where('branch_id', Auth::user()->branch_id), 'name'))->cantHide(),
            TD::make('teacher_id', 'O\'qituvchi')
                ->render(function ($model) {
                    return $model->teacher->name;
                }),
            TD::make('students', 'O\'quvchilar soni')
                ->render(function ($model) {
                    return $model->students->count();
                })->cantHide(),
            TD::make('attand', 'O\'tilgan darslar')
                ->render(function ($model) {
                    return $model->lessons->count();
                })->cantHide(),
            TD::make('branch_id', 'Filial')->filter(Relation::make('branch_id')->fromModel(Branch::class, 'name'))
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
            TD::make('day_type', 'Dars kunlari')
                ->render(function ($model) {
                    return Group::DAY_TYPE[$model->day_type];
                })->sort()->filter(Select::make()->options(Group::DAY_TYPE))->cantHide(),
            TD::make('is_active', 'Aktiv')
                ->render(function ($model) {
                    return $model->is_active ? Link::make()->icon('check')->type(Color::SUCCESS()) : Link::make()->icon('close')->type(Color::DANGER());
                })->sort(),
            TD::make('created_at', 'Kiritilgan sana')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                })->defaultHidden(),
            TD::make('updated_at', 'O`zgertirilgan sana')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                })->defaultHidden(),
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
            Sight::make('name', 'Nomi'),
            Sight::make('subject_id', 'Fan')->render(function ($model) {
                return $model->subject->name;
            }),
            Sight::make('teacher_id', 'Fan')->render(function ($model) {
                return $model->teacher->name;
            }),
            Sight::make('branch_id', 'Filial')
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
            Sight::make('day_type', 'Dars kunlari')->render(function ($model) {
                return Group::DAY_TYPE[$model->day_type];
            }),
            Sight::make('is_active', 'Aktiv')->render(function ($model) {
                return $model->is_active ? 'Ha' : 'Yo\'q';
            }),
            Sight::make('created_at', 'Kiritilgan sana')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('updated_at','O`zgertirilgan sana')->render(function ($model) {
                return $model->updated_at->toDateTimeString();
            }),
        ];
    }

    public function with(): array
    {
        return ['subject', 'branch', 'lessons', 'students', 'teacher'];
    }

    public function filters(): array
    {
        return [
            new DefaultSorted('id', 'desc'),
            WithTrashed::class,
        ];
    }

    public function rules(Model $model): array
    {
        return [
            'name' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'branch_id' => ['required'],
            'day_type' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Gurux nomi kiritilishi shart!',
            'subject_id.required' => 'Fan kiritilishi shart!',
            'subject_id.required' => 'O\'qituvchi kiritilishi shart!',
            'day_type.required' => 'Dars kuni kiritilishi shart!',
            'branch_id.required' => 'Filial kiritilishi shart!',
        ];
    }

    public static function icon(): string
    {
        return 'people';
    }

    public static function perPage(): int
    {
        return 15;
    }

    public static function permission(): ?string
    {
        return 'platform.groups';
    }

    public static function label(): string
    {
        return 'Guruxlar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining guruxlar ro`yhati';
    }

    public static function singularLabel(): string
    {
        return 'Gurux';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi gurux qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi gurux qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'Gurux malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'Guruxni o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'Gurux o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'Guruxni qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'Gurux malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi gurux';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'Guruxni o`zgartirish';
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
        //dd($request->all());
        if ($request->is_active == '0' && $model->students()->count())
        {
            Alert::error('Oldin guruxdagi talabalarni guruxdan chiqarish kerak!');
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
        if ($model->students()->count())
        {
            Alert::error('Oldin guruxdagi talabalarni guruxdan chiqarish kerak!');
        } else {
            $model->delete();
        }
    }
}
