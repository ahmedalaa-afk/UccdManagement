<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostVideo extends Model
{
    use SoftDeletes;
    protected $fillable=['video','post_id'];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
