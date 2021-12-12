<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    /**
     * Show all application users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merchants.index', [
            'merchants' => Merchant::where('user_id', auth()->user()->id)->paginate(15)
        ]);
    }
}
