<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;
use App\User;

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
        $category = Category::find($this->category_id);
        $user = User::find($this->user_id);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'biliner' => $this->biliner,
            'slug' => $this->slug,
            'views' => $this->views,
            'status' => $this->status,
            'imgUrl'=> $this->getFirstMediaUrl('blog_images', 'fullscreen'),
            'created_at' => $this->created_at,
            'category' => $category,
            'user' => $user
        ];
    }
}
