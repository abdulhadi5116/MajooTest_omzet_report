<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Outlet;
use App\Models\Transaction;

class Merchant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'merchant_name',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public function outlet()
    {
        return $this->hasMany(Outlet::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
