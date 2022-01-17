<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Location(){
        return  $this->belongsTo(Location::class,'location_id');
    }
    public function Employees(){
        return  $this->hasMany(User::class,'department_id','id');
    }
    public function Manager(){
        return  $this->belongsTo(User::class,'manager_id');
    }
    public function JobHistory(){
        return  $this->hasMany(JobHistory::class,'department_id','id');
    }
}
