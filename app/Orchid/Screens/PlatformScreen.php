<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Expense;
use App\Models\Payment;
use App\Models\Student;
use App\Orchid\Layouts\StatisticListener;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $all_students = Student::query()->count();
        $payments = Payment::query();
        $expenses = Expense::query();
        $debts = Student::query()->sum('debt');
        return [
            'statistic' => [
                    'year' => [
                        'payments'    => number_format((int)$payments->whereYear('created_at', date('Y'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereYear('created_at', date('Y'))->sum('price')),
                        'debts'   => number_format((int)$debts),
                        'all_students' => $all_students,
                        'new_students'    => (int)Student::query()->whereYear('created_at', date('Y'))->count(),
                    ],

                    'month' => [
                        'payments'    => number_format((int)$payments->whereMonth('created_at', date('m'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereMonth('created_at', date('m'))->sum('price')),
                        'debts'   => number_format((int)$debts),
                        'all_students' => $all_students,
                        'new_students'    => (int)Student::query()->whereMonth('created_at', date('m'))->count(),
                    ],

                    'day' => [
                        'payments'    => number_format((int)$payments->whereDay('created_at', date('d'))->sum('sum')),
                        'expenses' => number_format((int)$expenses->whereDay('created_at', date('d'))->sum('price')),
                        'debts'   => number_format((int)$debts),
                        'all_students' => $all_students,
                        'new_students'    => (int)Student::query()->whereDay('created_at', date('d'))->count(),
                    ],
            ],
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Saxovat ta\'lim';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Markazning umumiy boshqaruv paneli';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            /*Link::make('Website')
                ->href('http://orchid.software')
                ->icon('globe-alt'),

            Link::make('Documentation')
                ->href('https://orchid.software/en/docs')
                ->icon('docs'),

            Link::make('GitHub')
                ->href('https://github.com/orchidsoftware/platform')
                ->icon('social-github'),*/
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::tabs([
                'Kunlik' => Layout::metrics([
                        'To\'lov'    => 'statistic.day.payments',
                        'Chiqim' => 'statistic.day.expenses',
                        'Talabalar qarzi' => 'statistic.day.debts',
                        'Barcha talabalar' => 'statistic.day.all_students',
                        'Yangi talabalar' => 'statistic.day.new_students',
                    ]),
                'Oylik' => Layout::metrics([
                        'To\'lov'    => 'statistic.month.payments',
                        'Chiqim' => 'statistic.month.expenses',
                        'Talabalar qarzi' => 'statistic.month.debts',
                        'Barcha talabalar' => 'statistic.month.all_students',
                        'Yangi talabalar' => 'statistic.month.new_students',
                    ]),
                'Yillik' => Layout::metrics([
                        'To\'lov'    => 'statistic.year.payments',
                        'Chiqim' => 'statistic.year.expenses',
                        'Talabalar qarzi' => 'statistic.year.debts',
                        'Barcha talabalar' => 'statistic.year.all_students',
                        'Yangi talabalar' => 'statistic.year.new_students',
                    ]),
                'Belgilangan' => StatisticListener::class,
            ])->activeTab('Oylik'),
            //Layout::view('platform::partials.welcome'),
        ];
    }
}
