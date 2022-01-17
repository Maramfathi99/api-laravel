<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function Region(){
       return $this->belongsTo(Region::class,'region_id');
            }
            public function Locations(){
            return  $this->hasMany(Location::class,'country_id');
                    }
}
