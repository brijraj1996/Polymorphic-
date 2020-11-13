<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function tag()
    {
        return $this->morphOne(Tag::class, 'taggable');
    }
}
