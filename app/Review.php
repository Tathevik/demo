<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'thumb_up',
        'thumb_down',
    ];

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}
