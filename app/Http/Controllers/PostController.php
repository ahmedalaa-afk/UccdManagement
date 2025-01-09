<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use SoftDeletes;

    public function index(){
        $posts = Post::all();

        return ApiResponse::sendResponse('all posts retrieved successfully',$posts);
    }
}
