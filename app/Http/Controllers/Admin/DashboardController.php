<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // STAT CARDS
        $menuCount     = Menu::count();
        $categoryCount = Category::count();
        $orderCount    = Order::count();

        // TOTAL REVENUE
        $totalRevenue = Order::where('status', 'paid')->sum('total');

        // ======================
        // GRAFIK PENJUALAN PER MINGGU (7 HARI TERAKHIR)
        // ======================
        $weeklySales = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total) as total')
            )
            ->where('status', 'paid')
            ->whereBetween('created_at', [
                now()->subDays(6)->startOfDay(),
                now()->endOfDay()
            ])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        $weekLabels = [];
        $weekTotals = [];

        foreach ($weeklySales as $sale) {
            $weekLabels[] = date('d M', strtotime($sale->date));
            $weekTotals[] = $sale->total;
        }

        return view('admin.dashboard', compact(
            'menuCount',
            'categoryCount',
            'orderCount',
            'totalRevenue',
            'weekLabels',
            'weekTotals'
        ));
    }
}
