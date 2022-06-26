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

class RedDayResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\RedDay::class;
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
            Input::make('date')->type('date')->title('Ishlanmaydigan kun sanasi')
                ->help('Yakshanba kunidan tashqari ishlanmaydigan kun kiritiladi, va aynan shu kunda o`quvchilarning davomati hisobga olinmaydi')
                ->required(),
            Input::make('name')->type('text')->title('Tasnifi')->required(),
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
            TD::make('date', 'Sana')->filter(Input::make('date')->type('date'))->cantHide(),
            TD::make('name', 'Tasnifi')->filter(Input::make('name'))->cantHide(),
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
            Sight::make('date', 'Sana'),
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

    public function rules(Model $model): array
    {
        return [
            'name' => ['required'],
            'date' => ['required'],
            'branch_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'Sana kiritilishi shart',
            'name.required' => 'Tasnifi kiritilishi shart',
            'branch_id.required' => 'Filial kiritilishi shart',
        ];
    }

    public static function icon(): string
    {
        return 'calendar';
    }

    public static function perPage(): int
    {
        return 15;
    }

    public static function permission(): ?string
    {
        return 'platform.redDays';
    }

    public static function label(): string
    {
        return 'Ishlanmaydigan kunlar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining ishlamaydigan kunlari';
    }

    public static function singularLabel(): string
    {
        return 'Ishlanmaydigan kun';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi sana qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi sana qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'Sana malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'Sanani o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'Sana o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'Sanani qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'Sana malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi sana';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'Sanani o`zgartirish';
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
