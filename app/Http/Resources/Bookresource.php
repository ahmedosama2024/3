<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Bookresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'Title'=>$this->Title,
            'Author'=>$this->Author,
            'Published'=>$this->Published_at,
            'Genre'=>$this->Genre,
            'Describtion'=>$this->Describtion,

        ];
    }
}
