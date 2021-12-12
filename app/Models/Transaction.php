<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merchant;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'outlet_id',
        'bill_total',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }
   
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function scopeRevenue($query, array $merchant)
    {
        return $query->select('id', 'merchant_id', 'created_at')
        ->selectRaw('SUM(bill_total) AS revenue, DATE(created_at) as created_date')
        ->with('merchant','outlet')->whereIn('merchant_id', $merchant)
        ->orderBy('created_date')
        ->orderBy('merchant_id');
    }

    public function scopeRevenueNovMerchant($query)
    {
        return $query
            ->DB::statement('WITH RECURSIVE date_ranges AS (
                SELECT "2021-11-01" dt UNION ALL
                SELECT dt + INTERVAL 1 DAY FROM date_ranges
                WHERE dt + INTERVAL 1 DAY <= "2021-11-30")
                
                SELECT dt, COALESCE(SUM(`transactions`.`bill_total`), 0) AS revenue, merchant_name, outlet_name FROM date_ranges 
                LEFT JOIN transactions ON DATE(`transactions`.`created_at`) = dt
                LEFT JOIN merchants ON `merchants`.`id` = `transactions`.`merchant_id`
                LEFT JOIN outlets ON `outlets`.`id` = `transactions`.`outlet_id`
                GROUP BY dt, `transactions`.`merchant_id`');
    }

    // public function scopeNovMerchantOutlet()
    // {
    //     return $this
    //     ->DB::raw('WITH RECURSIVE date_ranges AS (
    //         SELECT "2021-11-01" dt UNION ALL
    //           SELECT dt + INTERVAL 1 DAY FROM date_ranges
    //           WHERE dt + INTERVAL 1 DAY <= "2021-11-30")
            
    //         SELECT dt, COALESCE(SUM(`transactions`.`bill_total`), 0), merchant_id FROM date_ranges 
    //         LEFT JOIN transactions ON DATE(`transactions`.`created_at`) = dt
    //         GROUP BY dt, merchant_id, outlet_id;')
    // }
}
