<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Story;
use App\Models\Album;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($storyId)
    {
        $story = Story::findorFail($id);

        return $story->getFirstMediaUrl('blog_images', 'fullscreen');
    }
}