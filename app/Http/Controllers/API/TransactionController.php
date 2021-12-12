<?php

namespace App\Http\Controllers\API;

use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class TransactionController extends BaseController
{
    /**
     * Show all transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = auth()->user();
        $merchant = Merchant::select('id')->where('user_id', $authUser->id)->pluck('id')->toArray();
        $transactions = Transaction::with('merchant','outlet')->whereIn('merchant_id', $merchant);

        return response()->json($transactions->paginate(5), 200);
    }

     /**
     * Show all transactions daily revenue.
     *
     * @return \Illuminate\Http\Response
     */
    public function revenue(Request $request)
    {
        $isOutlet = $request->query('isOutlet') == True ? True : False;

        $merchant = Merchant::select('id')->where('user_id', auth()->user()->id)->pluck('id')->toArray();
        if ($request->query() == null || count($request->query()) == 0) {
            $transactions = Transaction::revenue($merchant)->groupByRaw('created_date, merchant_id')->get();
        } elseif ($isOutlet) {
            $transactions = Transaction::revenue($merchant)->addSelect('outlet_id')->groupByRaw('created_date, merchant_id, outlet_id')->get();
        }

        return response()->json($transactions->paginate(5), 200);
    }

    /**
     * Show all transactions daily revenue on November.
     *
     * @return \Illuminate\Http\Response
     */
    public function revenueMonthly(Request $request)
    {
        $isOutlet = $request->query('isOutlet') == True ? True : False;

        $merchant = Merchant::select('id')->where('user_id', auth()->user()->id)->pluck('id')->toArray();
        if (($request->query('startdate') && $request->query('enddate'))) {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->query('startdate'));
            $endDate = Carbon::createFromFormat('Y-m-d', $request->query('enddate'));
    
            $dateRange = CarbonPeriod::create($startDate, $endDate);
            $transactionList = [];
            $dateList = [];
            foreach ($dateRange as $date) {
                $dateCarbon = $date->format('Y-m-d');

                if (!$isOutlet) {
                    $transactions = Transaction::revenue($merchant)
                        ->whereDate('created_at', $dateCarbon)
                        ->groupByRaw('created_date, merchant_id')
                        ->first();
                } else {
                    $transactions = Transaction::revenue($merchant)
                        ->addSelect('outlet_id')
                        ->whereDate('created_at', $dateCarbon)
                        ->groupByRaw('created_date, merchant_id, outlet_id')
                        ->first(); 
                }
                
                if ($transactions == null || !(isset($transactions))) {
                    $transactions = [
                        'created_date' => $dateCarbon,
                        'revenue' => 0
                    ];
                }

                $transactionList [] = (object) $transactions;
            }
        }

        return response()->json(collect($transactionList)->paginate(5), 200);
    }
}
