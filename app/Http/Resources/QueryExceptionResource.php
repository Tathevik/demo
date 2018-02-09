<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class QueryExceptionResource extends Resource
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
            'message'=> $this->message,
        ];
    }
}
