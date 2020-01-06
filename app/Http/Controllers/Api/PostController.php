<?php
namespace App\Http\Controllers\Api;
use App\Http\Resources\PostResource;
use App\Post;
use App\Http\Requests\StorePostRequest;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller

{
    public function index(){
        return PostResource::collection(Post::with('user')->paginate(2));

    }
    public function show($id){
        $post = Post::find($id);
        return new PostResource($post);
    }
    
    function store(StorePostRequest $request){
      
        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>$request->user_id

        ]);
        return new PostResource($post);

        


    }}
