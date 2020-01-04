<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content','user_id'];
    public function user(){
        // $post = Post::with('user')->get();
        return $this->belongsTo(User::class);
        // return $post;
    }


}
