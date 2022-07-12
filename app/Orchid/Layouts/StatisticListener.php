<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Fields\DateRange;
use Orchid\Screen\Layouts\Listener;
use Orchid\Support\Facades\Layout;

class StatisticListener extends Listener
{
    /**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'rangeDate'
    ];

    /**
     * What screen method should be called
     * as a source for an asynchronous request.
     *
     * The name of the method must
     * begin with the prefix "async"
     *
     * @var string
     */
    protected $asyncMethod = '';

    /**
     * @return Layout[]
     */
    protected function layouts(): iterable
    {
        return [
            Layout::rows([
                DateRange::make('rangeDate')->title('Vaqt oraligini tanlang'),
            ]),
        ];
    }
}
