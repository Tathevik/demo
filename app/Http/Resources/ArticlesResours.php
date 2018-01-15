<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ArticlesResours extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $article = [
            'userId' => $this->user_id,
            'title' => $this->title,
            'body' => $this->body,
        ];

        if($request->has('user')){
            $article+=[
                'user' => [
                    'name' => optional($this->user)->name,
                    'email' => optional($this->user)->email,
                ]
            ];
        }

        return $article;

    }


}
