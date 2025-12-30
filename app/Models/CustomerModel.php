<?php

namespace App\Models;

use App\Models\Faktur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $guarded = [];
    public function fakturs()
    {
        return $this->hasMany(Faktur::class, 'customer_id');
    }
}    
