<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name', 'slug'
    ];
    /**
     * Category has many stories
     */
    public function story()
    {
        $stories = $this->hasMany('App\Models\Story');
        foreach($stories as $story){
            $story['imgUrl'] = $story->getFirstMediaUrl('blog_images', 'fullscreen');
        }
        return $stories;

        //return $this->hasMany('App\Models\Story');
    }
}
