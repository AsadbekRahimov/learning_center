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

class TeacherResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Teacher::class;

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
                    ->title('O\'qituvchi ismi')
                    ->required()
                    ->placeholder('O\'qituvchi ismini kiriting'),
                Select::make('head_teacher_id')
                    ->title('Bosh o\'qituvchi')
                    ->fromQuery(Teacher::where('branch_id', '=', Auth::user()->branch_id)->whereNull('head_teacher_id'), 'name'),
                Select::make('branch_id')->fromModel(Branch::class, 'name')
                    ->value(Auth::user()->branch_id)->title('Filialni tanlang')->canSee(!$this->branch_user),
                Input::make('branch_id')->type('hidden')->value(Auth::user()->branch_id)->required()->canSee($this->branch_user),
            ])
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
            TD::make('name', 'Ismi')
                ->render(function ($model) {
                    return Link::make($model->name)->route('platform.groupInfo', ['group' => $model->id]);
                })->cantHide(),
            TD::make('head_teacher_id', 'Bosh o\'qituvchi')
                ->render(function ($model) {
                    return $model->headTeacher ? $model->headTeacher->name : '-';
                }),
            TD::make('branch_id', 'Filial')
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
            TD::make('balance', 'Hisobi'),
            TD::make('last_payment', 'Oxirgi to\'lov'),
            TD::make('last_paid_date', 'Oxirgi to\'lov sanasi'),
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
            Sight::make('name', 'Ismi'),
            Sight::make('head_teacher_id', 'Bosh o\'qituvchi')
                ->render(function ($model) {
                    return $model->headTeacher ? $model->headTeacher->name : '-';
                }),
            Sight::make('branch_id', 'Filial')
                ->render(function ($model) {
                    return $model->branch->name;
                })->canSee(!$this->branch_user),
            Sight::make('balance', 'Hisobi'),
            Sight::make('last_payment', 'Oxirgi to\'lov'),
            Sight::make('last_paid_date', 'Oxirgi to\'lov sanasi'),
        ];
    }

    public function with(): array
    {
        return ['branch', 'headTeacher', 'lowTeachers', 'group'];
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
            'branch_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Gurux nomi kiritilishi shart!',
            'branch_id.required' => 'Filial kiritilishi shart!'
        ];
    }

    public static function icon(): string
    {
        return 'globe-alt';
    }

    public static function perPage(): int
    {
        return 15;
    }

    public static function permission(): ?string
    {
        return 'platform.teachers';
    }

    public static function label(): string
    {
        return 'O\'qituvchilar';
    }


    public static function description(): ?string
    {
        return 'O`quv markazining o\'qituvchilari ro`yhati';
    }

    public static function singularLabel(): string
    {
        return 'O\'qituvchi';
    }

    public static function createButtonLabel(): string
    {
        return 'Yangi o\'qituvchi qo`shish';
    }

    public static function createToastMessage(): string
    {
        return 'Yangi o\'qituvchi qo`shildi';
    }

    public static function updateButtonLabel(): string
    {
        return 'O`zgartirish';
    }

    public static function updateToastMessage(): string
    {
        return 'O\'qituvchi malumotlari o`zgartirildi';
    }

    public static function deleteButtonLabel(): string
    {
        return 'O\'qituvchini o`chirish';
    }

    public static function deleteToastMessage(): string
    {
        return 'O\'qituvchi o`chirildi';
    }

    public static function saveButtonLabel(): string
    {
        return 'Saqlash';
    }

    public static function restoreButtonLabel(): string
    {
        return 'O\'qituvchini qayta tiklash';
    }

    public static function restoreToastMessage(): string
    {
        return 'O\'qituvchi malumotlari qayta tiklandi';
    }

    public static function createBreadcrumbsMessage(): string
    {
        return 'Yangi o\'qituvchi';
    }

    public static function editBreadcrumbsMessage(): string
    {
        return 'O\'qituvchini o`zgartirish';
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


    /**
     * Action to delete a model
     *
     * @param Model $model
     *
     * @throws Exception
     */
    public function onDelete(Model $model)
    {
        //dd($model->group);
        if ($model->group()->count())
        {
            Alert::error('Oldin o\'qituvchiga biriktirilgan guruxni boshqa o\'qituvchiga biriktirish kerak!');
        }elseif ($model->lowTeachers()->count()) {
            Alert::error('Oldin o\'qituvchiga biriktirilgan yordamchi o\'qituvchilarni boshqa bosh o\'qituvchiga biriktirish kerak!');
        }
        else {
            $model->delete();
        }
    }
}
