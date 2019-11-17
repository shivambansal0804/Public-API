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
        $stories = Story::where('status','published')->latest()->paginate(10);

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

        $previous = Story::where('id', '<', $story->id)->whereStatus('published')->max('id');
        $next = Story::where('id', '>', $story->id)->whereStatus('published')->min('id');

        $story['imgUrl'] = $story->getFirstMediaUrl('blog_images', 'fullscreen');
        $story['next'] = Story::find($next);
        $story['prev'] = Story::find($previous);

        return $story;
    }
}



