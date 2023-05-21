<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOneThrough;

class Pesanan extends Model
{
    use HasFactory;


    public function menu_pesanan(){
        return $this->hasMany(MenuPesanan::class);
    }

}
