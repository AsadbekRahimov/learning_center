<?php


namespace App\Services;


use App\Models\Discount;
use App\Models\Expense;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Source;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartService
{
    public static function sourceChart($begin = null, $end = null)
    {
        $students = Student::select('source_id', DB::raw('count(*) as count'))
            ->when(Auth::user()->branch_id, function ($query){
                return $query->where('branch_id', Auth::user()->branch_id);
          })->when(is_null($begin) && is_null($end), function ($query) {
                $query->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'));
          })->when(!is_null($begin) && !is_null($end), function ($query) use ($begin, $end) {
                $query->whereBetween('created_at', [$begin, $end]);
          })->groupBy('source_id')->get()->toArray();
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

    public static function paymentChart($begin = null, $end = null)
    {
        $payments = Payment::select('type', DB::raw('sum(sum) as sum'))
          ->where('status', '=', 'paid')
          ->when(Auth::user()->branch_id, function ($query){
                return $query->where('branch_id', Auth::user()->branch_id);
          })->when(is_null($begin) && is_null($end), function ($query) {
                $query->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'));
          })->when(!is_null($begin) && !is_null($end), function ($query) use ($begin, $end) {
                $query->whereBetween('created_at', [$begin, $end]);
          })->groupBy('type')->get()->toArray();

        $result =[
            'values' => [],
            'labels' => [],
        ];

        foreach ($payments as $payment) {
            $result['values'][] = $payment['sum'];
            $result['labels'][] = Payment::TYPES[$payment['type']];
        }
        return $result;
    }

    public static function expenseChart($begin = null, $end = null)
    {
        $expenses = Expense::select('type', DB::raw('sum(price) as sum'))
           ->when(Auth::user()->branch_id, function ($query){
                return $query->where('branch_id', Auth::user()->branch_id);
         })->when(is_null($begin) && is_null($end), function ($query) {
                $query->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'));
         })->when(!is_null($begin) && !is_null($end), function ($query) use ($begin, $end) {
                $query->whereBetween('created_at', [$begin, $end]);
         })->groupBy('type')->get()->toArray();

        $result = [
            'values' => [],
            'labels' => [],
        ];

        foreach ($expenses as $expense) {
            $result['values'][] = $expense['sum'];
            $result['labels'][] = Expense::TYPE[$expense['type']];
        }
        return $result;
    }

    public static function discountChart($begin = null, $end = null)
    {
        $branch = Auth::user()->branch_id;
        $discounts = Discount::select('type', DB::raw('sum(price) as sum'))
            ->when($branch, function ($query) use ($branch){
                return $query->whereIn('student_id', Student::query()->where('branch_id', $branch)->pluck('id'));
            })->when(is_null($begin) && is_null($end), function ($query) {
                $query->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'));
            })->when(!is_null($begin) && !is_null($end), function ($query) use ($begin, $end) {
                $query->whereBetween('created_at', [$begin, $end]);
            })->groupBy('type')->get()->toArray();

        $result =[
            'values' => [],
            'labels' => [],
        ];

        foreach ($discounts as $discount) {
            $result['values'][] = $discount['sum'];
            $result['labels'][] = Discount::TYPES[$discount['type']];
        }
        return $result;
    }

    public static function debtsChart()
    {
        $payments = Payment::select('group_id', DB::raw('sum(sum) as sum'))
            ->whereNot('status', '=', 'paid')
            ->when(Auth::user()->branch_id, function ($query){
                return $query->where('branch_id', Auth::user()->branch_id);
            })->groupBy('group_id')->get()->toArray();

        $groups = Group::query()->pluck('name', 'id')->toArray();
        //dd($groups);

        $result = [
            'values' => [],
            'labels' => [],
        ];

        foreach ($payments as $payment) {
            $result['values'][] = $payment['sum'];
            $result['labels'][] = $groups[$payment['group_id']];
        }
        return $result;
    }
}
