<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPesanan extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id ', 'pesanan_id ', 'jumlah', '	harga'];

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }

    public function menu(){
        return $this->hasMany(Pesanan::class);
    }
}
