<?php

namespace App\Orchid\Layouts\Teacher;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PaymentGroupTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'payment';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->render(function ($model){
                return CheckBox::make('ids[]')->value($model->group_id)->checked(false);
            }),
            TD::make('group_id', 'Gurux')->render(function ($model) {
                return Link::make($model->group->name)->route('platform.groupInfo', ['group' => $model->group_id]);
            }),
            TD::make('sum', 'To\'lov miqdori')->render(function ($model) {
                return number_format($model->sum * $model->group->teacher->percent / 100);
            }),
        ];
    }
}
