<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // generating a slug
    public function setTitleAttribute($value)
    {     
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function getUrlAttribute()
    {
        return route('posts.show', [$this->id,$this->slug]);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
