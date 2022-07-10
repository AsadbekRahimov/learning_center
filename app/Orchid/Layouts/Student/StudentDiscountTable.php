<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Discount;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class StudentDiscountTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'discounts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('price', 'Chegirma miqdori')->render(function (Discount $discount) {
                 return number_format($discount->price);
            }),
            TD::make('type', 'Chegirma turi')->render(function (Discount $discount) {
                return Discount::TYPES[$discount->type];
            }),
            TD::make('desc', 'Tasnifi'),
        ];
    }
}
