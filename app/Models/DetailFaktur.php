<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailFaktur extends Model
{
    protected $guarded = [];
    protected $table = 'detail';
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function faktur()
    {
        return $this->belongsTo(Faktur::class, 'faktur_id');
    }
}
