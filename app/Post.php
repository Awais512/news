<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Post extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
