<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilingProduct extends Model
{
    use HasFactory;
    protected $table = 'billing_products';
    protected $guarded = ['id','created_at','updated_at'];

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
