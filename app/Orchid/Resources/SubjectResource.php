<?php

namespace App\Orchid\Resources;

use App\Models\Branch;
use App\Models\Group;
use App\Orchid\Filters\WithTrashed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class SubjectResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Subject::class;

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
                    ->title('Fan nomi')
                    ->required()
                    ->placeholder('O`qitiladigan fanning nomi kiritiladi'),
                Input::make('price')
                    ->title('Fan narxi')
                    ->type('number')
                    ->required(),
            ]),
            Input::make('branch_id')->type('hidden')->value(Auth::user()->branch_id)->required()->canSee($this->branch_user),
            Select::make('branch_id')->fromModel(Branch::class, 'name')
                ->value(Auth::user()->branch_id)->title('Filialni tanlang')->canSee(!$this->branch_user),
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
            TD::make('name', 'Nomi')->cantHide(),
            TD::make('price', 'Narxi')->cantHide()
                ->render(function ($model) {
                    return number_format($model->price);
                }),
            TD::make('branch_id', 'Filial')->filter(Relation::make('branch_id')->fromModel(Branch::class, 'name'))
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
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
            Sight::make('branch_id', 'Filial')
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
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
        return ['branch'];
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
            'price' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Fan nomi kiritilishi shart!',
            'price.required' => 'Fan narxi kiritilishi shart!'
        ];
    }

    public static function icon(): string
    {
        return 'book-open';
    }

    public static function perPage(): int
    {
        return 15;
    }

    public static function permission(): ?string
    {
        return 'platform.subjects';
    }

    public static function label(): string
    {
        return 'Fanlar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining fanlari ro`yhati';
    }

    public static function singularLabel(): string
    {
        return 'Fan';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi fan qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi fan qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'Fan malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'Fanni o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'Fan o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'Fanni qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'Fan malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi fan';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'Fanni o`zgartirish';
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
}
