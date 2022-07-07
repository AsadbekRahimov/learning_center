<?php

namespace App\Orchid\Resources;

use App\Models\Branch;
use App\Orchid\Filters\WithTrashed;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;

class BranchResource extends Resource
{

    public static $model = \App\Models\Branch::class;

    public function fields(): array
    {
        return [
            Group::make([
                Input::make('name')
                    ->title('Filial nomi')
                    ->placeholder('O`quv markazining filial nomini kiriting')
                    ->required(),
                Select::make('payment_period')
                    ->title('To\'lov davomiyligi')
                    ->options(Branch::PAYMENT_PERIOD)
                    ->required(),
            ]),
        ];
    }

    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('name', 'Nomi')->cantHide(),
            TD::make('payment_period', 'To\'lov davomiyligi')
                ->render(function ($model) {
                    return Branch::PAYMENT_PERIOD[$model->payment_period];
                })->cantHide(),
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

    public function legend(): array
    {
        return [
            Sight::make('id', 'ID'),
            Sight::make('name', 'Nomi'),
            Sight::make('payment_period', 'To\'lov davomiyligi')->render(function ($model) {
                return Branch::PAYMENT_PERIOD[$model->payment_period];
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
            'name.required' => 'Filial nomi kiritilishi shart!'
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
        return 'platform.branches';
    }

    public static function label(): string
    {
        return 'Filiallar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining filillari ro`yhati';
    }

    public static function singularLabel(): string
    {
        return 'Filial';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi filial qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi filial qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'Filial malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'Filialni o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'Filial o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'Filialni qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'Filial malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi filial';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'Filialni o`zgartirish';
    }

    public static function emptyResourceForAction(): string
    {
        return 'Bu amallarni bajarish uchun malumotlar mavjud emas';
    }

    public function onDelete(Model $model)
    {
        Alert::error('Barcha malumotlar filialga bog\'langanligi sababli filialni ochira olmaysiz! Filalni taxrirlashga urunip koring.');
    }
}
