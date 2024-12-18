<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $table = 'billing';
    protected $guarded = ['id','created_at','updated_at'];

    public function products(){
        return $this->hasMany(BilingProduct::class);
    }
}
