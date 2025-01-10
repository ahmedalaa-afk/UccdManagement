<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use SoftDeletes;


    public function index()
    {
        $posts = Post::all();
        return ApiResponse::sendResponse('all posts retrieved successfully', $posts);
    }



    public function store(StorePostRequest $request)
    {
        $imagePath = null;
        $videoPath = null;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imagePath =  $image->storeAs('images/courses', Str::uuid() . '.' . $image->getClientOriginalExtension(), 'public');
        }

        if ($request->file('video')) {
            $video = $request->file('video');
            $imagePath =  $image->storeAs('videos/posts/', Str::uuid() . '.' . $video->getClientOriginalExtension(), 'public');
        }

        $manager = Auth::guard('manager')->user();

        return $manager;

        $post = $manager->posts->create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title) . '-' . Str::uuid(),
            'image' => $imagePath,
            'video' => $videoPath,
            'manager_id' => $manager->id,
        ]);
    }
}
