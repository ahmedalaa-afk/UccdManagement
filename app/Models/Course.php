<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory,SoftDeletes;

    protected $fillable=['title', 'description','location','start_at','end_at','status','manager_id'];

    public function manager(){
        $this->belongsTo(Manager::class);
    }
}
