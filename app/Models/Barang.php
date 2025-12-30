<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailFaktur;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function details()
    {
        return $this->hasMany(DetailFaktur::class, 'barang_id');
    }
}
