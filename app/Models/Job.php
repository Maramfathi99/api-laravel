<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Users(){
        return  $this->hasMany(User::class,'job_id','id');
    }
    public function JobHistory(){
        return  $this->hasMany(JobHistory::class,'job_id','id');
    }
}
