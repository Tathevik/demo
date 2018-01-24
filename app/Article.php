<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function scopeFilter($query, $request)
    {
        if($request->has('month')){
            $query->whereMonth('created_at', Carbon::parse($request->month)->month);
        }
        if($request->has('year')){
            $query->whereYear('created_at', $request->year);
        }
    }
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'article_id');
    }
}
