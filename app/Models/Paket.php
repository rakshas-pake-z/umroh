<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $fillable = [
        'nama',
        'harga',
        'by_airport'
    ];

    public function FormUmroh() {
        return $this->hasMany(FormUmroh::class);
    }
}
