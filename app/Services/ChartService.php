<?php


namespace App\Services;


use App\Models\Source;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChartService
{
    public static function sourceChart()
    {
        $students = Student::select('source_id', DB::raw('count(*) as count'))->groupBy('source_id')->get()->toArray();
        $sources = Source::query()->pluck('name', 'id')->toArray();
        $result =[
           'values' => [],
           'labels' => [],
        ];

        foreach ($students as $student) {
            $result['values'][] = $student['count'];
            $result['labels'][] = $sources[$student['source_id']];
        }
        return $result;
    }
}
