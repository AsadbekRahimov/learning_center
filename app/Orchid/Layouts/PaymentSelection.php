<?php

namespace App\Orchid\Layouts;

use App\Orchid\Filters\MonthFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class PaymentSelection extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        return [
            MonthFilter::class,
        ];
    }
}
