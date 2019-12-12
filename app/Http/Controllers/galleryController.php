<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Album;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('status', 'published')->where('album_id', NULL)->get();
        $tempArr = [];

        foreach ($albums as $item){

            array_push($tempArr,
            ['name' => $item->name,
            
            'biliner' => $item->biliner,
            'slug' => $item->slug,
            'album_id'=> $item->album_id,
            'status' => $item->status,
            'album_imgUrl'=> $item->getFirstMediaUrl('covers', 'cover'),
            
            ]);
           
        }

        return $tempArr;
        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $album = Album::whereSlug($slug)->firstOrFail();
        $images = $album->image()->where('status', '!=', 'draft')->get();
        $subs = $album->child()->with('user')->get();

        $image_urls=[];
        $sub_urls = [];
        foreach($images as $url){
            array_push($image_urls,

            ['url' =>  $url->getFirstMediaUrl('images', 'fullscreen'),
            'name'=> $url->name,
            'biliner'=> $url->biliner,
            
            ]
        
        );
            
    }
    foreach ($subs as $subItem){
            array_push($sub_urls,
            [
                'url' => $subItem->getFirstMediaUrl('covers','thumb'),
                'name'=> $subItem->name,
                'slug' => $subItem->slug,
            ]
            );

    }


        $album_Object = 
        [   'name' => $album->name,
            'biliner' => $album->biliner,
            'slug' => $album->slug,
            'album_id'=> $album->album_id,
            'status' => $album->status,
            'album_imgUrl'=> $album->getFirstMediaUrl('covers', 'cover'),
            'image_info'=> $image_urls,
            'subs_info'=> $sub_urls,
            
    ];

        return $album_Object;
    }
}