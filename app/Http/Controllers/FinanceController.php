<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function FinanceFix()
    {
        // Penghasilan Harian (7 hari terakhir)
        $dailyIncomeRaw = DB::table('orders')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(harga) as total'))
            ->whereBetween('created_at', [
                Carbon::now()->subDays(6)->startOfDay(),
                Carbon::now()->endOfDay()
            ])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'asc')
            ->get();

        // Format hari: Senin, Selasa, ...
        $dailyIncome = $dailyIncomeRaw->map(function ($item) {
            $item->day = Carbon::parse($item->date)->translatedFormat('l'); // e.g. 'Senin'
            return $item;
        });

        // Penghasilan Bulanan (6 bulan terakhir)
        $monthlyIncomeRaw = DB::table('orders')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(harga) as total'))
            ->whereBetween('created_at', [
                Carbon::now()->subMonths(5)->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
            ->orderBy('month', 'asc')
            ->get();

        // Format bulan: Januari, Februari, ...
        $monthlyIncome = $monthlyIncomeRaw->map(function ($item) {
            $item->month_name = Carbon::parse($item->month . '-01')->translatedFormat('F'); // e.g. 'Januari'
            return $item;
        });

        // Total Pendapatan Hari Ini
        $incomeToday = DB::table('orders')
            ->whereDate('created_at', Carbon::today())
            ->sum('harga');

        // Total Pendapatan Bulan Ini
        $incomeThisMonth = DB::table('orders')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('harga');

        return view('pages.finance.FinanceFix', [
            'dailyIncome' => $dailyIncome,
            'monthlyIncome' => $monthlyIncome,
            'incomeToday' => $incomeToday,
            'incomeThisMonth' => $incomeThisMonth
        ]);
    }
}
