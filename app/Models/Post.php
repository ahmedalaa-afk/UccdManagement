<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'manager_id','image','video'];
    public function manager(){
        return $this->belongsTo(Manager::class);
    }

}
