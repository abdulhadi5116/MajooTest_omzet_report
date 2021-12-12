<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merchant;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'outlet_name',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
