<?php

namespace App\Orchid\Resources;

use App\Models\Branch;
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
use Orchid\Support\Facades\Alert;

class RoomResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Room::class;

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
            Input::make('name')->type('text')->title('Xona nomi')->required(),
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
            TD::make('name', 'Xona nomi')->filter(Input::make('name'))->cantHide(),
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
            Sight::make('name', 'Tasnif'),
            Sight::make('branch_id', 'Filial')
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
        ];
    }

    public function with(): array
    {
        return ['branch'];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            new DefaultSorted('id', 'desc'),
        ];
    }

    public function actions(): array
    {
        return [

        ];
    }

    public function rules(Model $model): array
    {
        return [
            'name' => ['required'],
            'branch_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nomi kiritilishi shart',
            'branch_id.required' => 'Filial kiritilishi shart',
        ];
    }

    public static function icon(): string
    {
        return 'building';
    }

    public static function perPage(): int
    {
        return 15;
    }

    public static function permission(): ?string
    {
        return 'platform.rooms';
    }

    public static function label(): string
    {
        return 'Xonalar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining oquv xonalari';
    }

    public static function singularLabel(): string
    {
        return 'Xona';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi xona qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi xona qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'Xona malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'Xonani o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'Xona o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'Xonani qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'Xona malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi xona';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'Xonani o`zgartirish';
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

    public function onDelete(Model $model)
    {
        if ($model->groups()->count())
        {
            Alert::error('Oldin bu xonaga biriktirilgan guruxlarni xonadan chiqarish kerak!');
        } else {
            $model->delete();
        }
    }
}
