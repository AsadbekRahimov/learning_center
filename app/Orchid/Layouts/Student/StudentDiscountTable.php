<?php

namespace App\Orchid\Layouts\Student;

use App\Models\Discount;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

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
                 return Link::make(number_format($discount->price))->type(Color::SUCCESS());
            }),
            TD::make('type', 'Chegirma turi')->render(function (Discount $discount) {
                return Discount::TYPES[$discount->type];
            }),
            TD::make('created_at', 'Sana')->render(function (Discount $discount) {
                return $discount->created_at->format('Y-m-d');
            }),
        ];
    }
}
