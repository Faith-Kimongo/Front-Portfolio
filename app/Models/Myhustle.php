<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myhustle extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    // comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // Likes
    public function likes(){
        return $this->hasMany(Like::class,'myhustle_id');
    }




public function isLiked(): bool
{
    if (auth()->user()) {
        return $this->likes()->count();
    }

    return false;
}

public function removeLike(): bool
{
    if (auth()->user()) {
        return auth()->user()->likes()->forHustle($this)->delete();
    }

    return false;
}






}
