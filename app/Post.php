<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // category_id(FK) dalam table posts
    // milik table categories(Modal Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
