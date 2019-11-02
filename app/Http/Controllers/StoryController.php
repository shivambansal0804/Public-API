<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Story;
use App\Http\Resources\Story as StoryResource;
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
        $stories = Story::where('status','published')->get();

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
        $story = Story::where(['slug'=> $slug, 'status' => 'published'])->with('user')->firstOrFail();

        $ret_object = [
            'id' => $story->id,
            'title' => $story->title,
            'biliner' => $story->biliner,
            'slug' => $story->slug,
            'body' => $story->body,
            'status' => $story->status,
            'imgUrl'=> $story->getFirstMediaUrl('blog_images', 'fullscreen'),
            'user' => $story->user,
            'created_at' => $story->created_at
        ];

        return $story;
    }
}