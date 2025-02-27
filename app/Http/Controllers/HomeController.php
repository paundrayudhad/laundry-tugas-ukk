<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use App\Models\Cabang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $totalUsers = User::count();

    if (Auth::user()->role == 'admin') {
        $transaksi = Transaksi::get();

        // Mengambil jumlah pesanan & total pendapatan per cabang
        $statsPerBranch = Transaksi::selectRaw('cabang_id, COUNT(*) as total_orders, SUM(total_harga) as total_revenue')
            ->groupBy('cabang_id')
            ->get()
            ->keyBy('cabang_id');

        // Memisahkan hasil ke dalam array untuk dipakai di Blade
        $ordersPerBranch = $statsPerBranch->mapWithKeys(fn($item) => [$item->cabang_id => $item->total_orders]);
        $revenuePerBranch = $statsPerBranch->mapWithKeys(fn($item) => [$item->cabang_id => $item->total_revenue]);
        
        // Mengambil semua cabang yang memiliki transaksi
        $branches = Cabang::whereIn('id', $ordersPerBranch->keys())->get();
    } else {
        $transaksi = Transaksi::where('user_id', Auth::id())->get();
        $ordersPerBranch = collect();
        $revenuePerBranch = collect();
        $branches = collect(); // Kosongkan jika bukan admin
    }

    // Menghitung jumlah pesanan berdasarkan status
    $totalOrders = $transaksi->count();
    $pendingOrders = $transaksi->where('status', 'pending')->count();
    $processingOrders = $transaksi->where('status', 'proses')->count();
    $completedOrders = $transaksi->where('status', 'selesai')->count();

    return view('home', compact(
        'totalUsers', 'pendingOrders', 'totalOrders', 'processingOrders', 
        'completedOrders', 'ordersPerBranch', 'branches', 'revenuePerBranch', 'transaksi'
    ));
}

}
