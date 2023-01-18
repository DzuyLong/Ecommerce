<?php

namespace App\Http\Resources\resourcesite;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
class ProductResourceSite extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image_url' => Url::to('uploads/images/'. $this->image ?: null),
            'price' => $this->price,
            'category_id' => $this->category_id,
            'inventory_id' => $this->inventory_id,
            'published' => (bool)$this->published,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
