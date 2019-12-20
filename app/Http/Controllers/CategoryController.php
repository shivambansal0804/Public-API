<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Story;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = [];
        $category_object =  Category::where('id', $id)->firstOrFail();

        $stories = Story::where('status', 'published')->where('category_id', $id)->get();
        foreach($stories as $story){
            // if ($item->status != 'published') continue;
            $story->makeHidden(['body', 'media']);
            $story['imgUrl'] = $story->getFirstMediaUrl('blog_images', 'fullscreen');
            array_push($list,$story);
        }
        // $category_object['stor'] = $list;
        $result = [
            'id' => $category_object->id,
            'name' => $category_object->name,
            'item' => $list
        ];

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
