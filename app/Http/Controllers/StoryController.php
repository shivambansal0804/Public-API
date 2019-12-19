<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\{Story, Category};
use App\Http\Resources\Story as StoryResource;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::where('status','published')->with(['user', 'category'])->latest()->paginate(10);
        return $stories;
        return StoryResource::collection($stories); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $story = Story::where(['slug'=> $slug, 'status' => 'published'])->firstOrFail();
        $previous = Story::where('id', '<', $story->id)->whereStatus('published')->max('id');
        $next = Story::where('id', '>', $story->id)->whereStatus('published')->min('id');
        $user = User::find($story->user_id);
        $category = Category::find($story->category_id);

        $user['imgUrl'] = $user->getFirstMediaUrl('avatars', 'thumb');
        $story['imgUrl'] = $story->getFirstMediaUrl('blog_images', 'fullscreen');
        $story['next'] = Story::find($next);
        $story['prev'] = Story::find($previous);
        $story['user'] = $user;
        $story['category'] = $category;

        return $story;
    }
}




