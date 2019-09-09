<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Story extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // if($this->getFirstMediaUrl('blog_images', 'fullscreen')){
        //     $imgUrl = $this->getFirstMediaUrl('blog_images', 'fullscreen');
        // }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'biliner' => $this->biliner,
            'slug' => $this->slug,
            'status' => $this->status,
            'imgUrl'=> $this->getFirstMediaUrl('blog_images', 'fullscreen'),
            'created_at' => $this->created_at
        ];
    }
}
