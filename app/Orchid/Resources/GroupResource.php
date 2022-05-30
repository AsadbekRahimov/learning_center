<?php

namespace App\Orchid\Resources;

use App\Models\Branch;
use App\Models\Subject;
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

class GroupResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Group::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title('Gurux nomi')
                ->required()
                ->placeholder('Gurux nomini kiriting'),
            Select::make('subject_id')
                ->title('Fan')
                ->fromQuery(Subject::where('branch_id', '=', Auth::user()->branch_id), 'name')
                ->required(),
            Input::make('branch_id')
                ->type('hidden')
                ->value(Auth::user()->branch_id),
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
            TD::make('name', 'Nomi')->cantHide(),
            TD::make('subject_id', 'Fan')
                ->render(function ($model) {
                    return $model->subject->name;
                })->cantHide(),
            TD::make('branch_id', 'Filial')
                ->render(function ($model) {
                    return $model->branch->name;
                })->filter(Relation::make()->fromModel(Branch::class, 'name'))->defaultHidden(),
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
            Sight::make('branch_id', 'Filial')->render(function ($model) {
                return $model->branch->name;
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
        return ['subject', 'branch'];
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
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Gurux nomi kiritilishi shart!',
            'subject_id.required' => 'Fan kiritilishi shart!'
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
        return $model->query()->where('branch_id', Auth::user()->branch_id);
    }

    public function paginationQuery(ResourceRequest $request, Model $model): Builder
    {
        return $model->query()->where('branch_id', Auth::user()->branch_id);
    }
}
