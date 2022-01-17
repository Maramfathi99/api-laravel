<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Region extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function Countries(){
$this->hasMany(Country::class,'region_id','id');
    }
}
