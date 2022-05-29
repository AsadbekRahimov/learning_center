<?php

namespace App\Orchid\Resources;

use App\Orchid\Filters\WithTrashed;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class SourceResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Source::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title('Hamkor nomi')
                ->required()
                ->placeholder('Hamkor nomini kiriting'),
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
            TD::make('name', 'Hamkor')->cantHide(),

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
            Sight::make('name', 'Hamkor'),
        ];
    }

    public function with(): array
    {
        return [];
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
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Hamkor nomi kiritilishi shart!',
        ];
    }

    public static function icon(): string
    {
        return 'directions';
    }

    public static function perPage(): int
    {
        return 15;
    }

    public static function permission(): ?string
    {
        return 'platform.sources';
    }

    public static function label(): string
    {
        return 'Hamkorlar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining hamkorlar ro`yhati';
    }

    public static function singularLabel(): string
    {
        return 'Hamkor';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi hamkor qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi hamkor qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'Hamkor malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'Hamkorni o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'Hamkor o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'Hamkorni qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'Hamkor malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi hamkor';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'Hamkorni o`zgartirish';
    }

    public static function emptyResourceForAction(): string
    {
        return 'Bu amallarni bajarish uchun malumotlar mavjud emas';
    }
}
