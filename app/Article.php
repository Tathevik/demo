<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($params)
    {
        return $this->comments()->create($params);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
