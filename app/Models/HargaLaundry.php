<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaLaundry extends Model
{
    use HasFactory;

    protected $table = 'harga_laundry';

    protected $fillable = ['jenis', 'lama', 'kg', 'harga', 'status'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
