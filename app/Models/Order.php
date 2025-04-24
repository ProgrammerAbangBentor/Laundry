<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'harga_laundry_id',
        'no_transaksi',
        'berat_pakaian',
        'status_pembayaran',
        'harga',
        'lama',
        'diskon',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hargaLaundry()
    {
        return $this->belongsTo(HargaLaundry::class);
    }
}
