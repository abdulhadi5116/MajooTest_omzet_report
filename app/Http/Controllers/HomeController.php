<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Merchant;
use App\Models\Outlet;

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
        $merchants = Merchant::select('id')->where('user_id', auth()->user()->id)->pluck('id')->toArray();
        $outletCount = Outlet::whereIn('merchant_id', $merchants)->count();
        $transactionCount = Transaction::whereIn('merchant_id', $merchants)->count();
        $monthlyRevenue = Transaction::selectRaw('SUM(bill_total) AS revenue')->whereIn('merchant_id', $merchants)->groupByRaw('MONTH(created_at)')->first();

        return view('home', compact('merchants','outletCount','transactionCount','monthlyRevenue'));
    }
}
