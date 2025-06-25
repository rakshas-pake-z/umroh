<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormUmroh extends Model
{
    protected $table = 'form_umroh';
    protected $fillable = [
        'tgl_daftar',
        'paket_id',
        'nama',
        'alamat',
        'email',
        'no_hp',
        'jml_jamaah',
        'tgl_berangkat',
        'keterangan',
        'room'
    ];

    public function Paket() {
        return $this->belongsTo(Paket::class);
    }
}
