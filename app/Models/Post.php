<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }

    public function commentsCount()
    {
        return $this->comments()->count();
    }

    public function likes() {
        return $this->hasMany('App\Models\Like')->orderBy('id','desc');
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }
}
