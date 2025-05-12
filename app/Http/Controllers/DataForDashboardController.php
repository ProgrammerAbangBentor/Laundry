<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataForDashboardController extends Controller
{
    public function index()
    {
        $users_total = DB::table('users')->count();
        $orders_total = DB::table('orders')->count();
        $costumer_total = DB::table('users')->where('role', 'Costumer')->count();

        $intervals = [
            ['06:00', '09:00'],
            ['09:00', '12:00'],
            ['12:00', '15:00'],
            ['15:00', '18:00'],
            ['18:00', '21:00'],
            ['21:00', '24:00'],
        ];

        $data = [];
        $total_order_today = 0;
        $total_items_today = 0;
        $total_income_today = 0;

        foreach ($intervals as [$start, $end]) {
            $startTime = Carbon::today()->setTimeFromTimeString($start);
            $endTime = $end === '24:00' ? Carbon::tomorrow() : Carbon::today()->setTimeFromTimeString($end);

            $orders = DB::table('orders')->whereBetween('created_at', [$startTime, $endTime]);

            $jumlah_order = $orders->count();
            $jumlah_barang = $orders->sum('berat_pakaian');
            $jumlah_harga = $orders->sum('harga');

            $data[] = [
                'waktu' => "$start - $end",
                'jumlah_order' => $jumlah_order,
                'jumlah_barang' => $jumlah_barang,
                'jumlah_harga' => $jumlah_harga,
            ];

            $total_order_today += $jumlah_order;
            $total_items_today += $jumlah_barang;
            $total_income_today += $jumlah_harga;
        }

        return view('pages.dashboard', [
            'users_total' => $users_total,
            'orders_total' => $orders_total,
            'costumer_total' => $costumer_total,
            'data' => $data,
            'total_order_today' => $total_order_today,
            'total_items_today' => $total_items_today,
            'total_income_today' => $total_income_today,
        ]);
    }
}


