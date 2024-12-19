<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable=['title','slug', 'description','location','start_at','end_at','status','manager_id','instructor_id'];

    public function manager(){
        return $this->belongsTo(Manager::class);
    }
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }
    public function students(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
