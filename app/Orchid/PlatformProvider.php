<?php

declare(strict_types=1);

namespace App\Orchid;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            /*Menu::make('Example screen')
                ->icon('monitor')
                ->route('platform.example')
                ->title('Navigation')
                ->badge(function () {
                    return 6;
                }),

            Menu::make('Dropdown menu')
                ->icon('code')
                ->list([
                    Menu::make('Sub element item 1')->icon('bag'),
                    Menu::make('Sub element item 2')->icon('heart'),
                ]),

            Menu::make('Basic Elements')
                ->title('Form controls')
                ->icon('note')
                ->route('platform.example.fields'),

            Menu::make('Advanced Elements')
                ->icon('briefcase')
                ->route('platform.example.advanced'),

            Menu::make('Text Editors')
                ->icon('list')
                ->route('platform.example.editors'),

            Menu::make('Overview layouts')
                ->title('Layouts')
                ->icon('layers')
                ->route('platform.example.layouts'),

            Menu::make('Chart tools')
                ->icon('bar-chart')
                ->route('platform.example.charts'),

            Menu::make('Cards')
                ->icon('grid')
                ->route('platform.example.cards')
                ->divider(),

            Menu::make('Documentation')
                ->title('Docs')
                ->icon('docs')
                ->url('https://orchid.software/en/docs'),

            Menu::make('Changelog')
                ->icon('shuffle')
                ->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')
                ->target('_blank')
                ->badge(function () {
                    return Dashboard::version();
                }, Color::DARK()),*/

            Menu::make('Dars jadval')
                ->icon('calendar')
                ->route('platform.timetable')
                ->title('O\'quv bo\'limi')
                ->permission('platform.timetable')
                ->canSee(!is_null(Auth::user()->branch_id)),

            Menu::make('Kirim-chiqim')
                ->icon('calculator')
                ->list([
                    Menu::make('To\'lovlar')
                        ->icon('money')
                        ->route('platform.payments.list')
                        ->permission('platform.payments'),

                    Menu::make('Chiqimlar')
                        ->icon('note')
                        ->route('platform.expenses')
                        ->permission('platform.expenses'),
                ])->title('Bugalteriya'),

            Menu::make('Foydalanuvchilar')
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title('Maxsus vazifalar'),

            Menu::make('Rollar')
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

            Menu::make('SMS xabarlar')
                ->icon('envelope')
                ->route('platform.messages')
                ->permission('platform.editMessages'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Shaxsiy profil')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('Tizim vakolatlari'))
                ->addPermission('platform.systems.roles', 'Rollar')
                ->addPermission('platform.systems.users', __('Foydalanuvchilar'))
                ->addPermission('platform.editMessages', 'Sms xabarlar matnini o`zgartirish'),

            ItemPermission::group('Maxsus vakolatlar')
                ->addPermission('platform.branches', 'Filial')
                ->addPermission('platform.subjects', 'Fan')
                ->addPermission('platform.groups', 'Gurux')
                ->addPermission('platform.sources', 'Hamkorlar')
                ->addPermission('platform.students', 'Talabalar')
                ->addPermission('platform.addStudentToGroup', 'Talaba malumotlari')
                ->addPermission('platform.redDays', 'Ishlanmaydigan kunlar')
                ->addPermission('platform.teachers', 'O\'qituvchilar')
                ->addPermission('platform.teacherInfo', 'O\'qituvchi malumotlari')
                ->addPermission('platform.rooms', 'O\'quv xonalari')
                ->addPermission('platform.timetable', 'Dars jadvali')
                ->addPermission('platform.groupInfo', 'Gurux ma\'lumotlari')
                ->addPermission('platform.attandance', 'Yo\'qlama qilish')
                ->addPermission('platform.giveSalary', 'Oylik berish')
                ->addPermission('platform.editLesson', 'Dars limitini o`zgartirish')
                ->addPermission('platform.editStudentStatus', 'Talabaning talim bosqichini o`zgartirish')
                ->addPermission('platform.editGroupPrice', 'Imtiyozli talabaning kurs narxini belgilash')
                ->addPermission('platform.rollbackStudentPayment', 'Talabaga pulini qaytarib berish'),

            ItemPermission::group('Bugalteriya')
                ->addPermission('platform.payments', 'To\'lovlar')
                ->addPermission('platform.expenses', 'Chiqimlar'),
        ];
    }
}
