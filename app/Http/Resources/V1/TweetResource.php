<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'text' => $this->text,
            'created_by' => [
                'name' => $this->createdBy->name,
                'nickname' => $this->createdBy->nickname,
                'email' => $this->createdBy->email,
            ],
            'created_at' => $this->created_at,
        ];
    }
}
