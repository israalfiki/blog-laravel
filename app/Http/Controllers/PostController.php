<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;

use Illuminate\Http\Request;
use App\Post; // -> /providers/Post.php , this is the namespace

class PostController extends Controller
{
    function create(){
        return view('posts.create');
    }
    function store(StorePostRequest $request){
        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>$request->user()->id

        ]);
        return redirect()->route('posts.index');


    }
    function index(){
     
            $posts = Post::simplePaginate(5);
    
            return view('posts.index', ['posts' => $posts]);

    
        // return view('posts.index', [
        //     'posts'=> Post::all()

        // ]);
    }
    function show($id){
        $post = Post::find($id);
        return view('posts.show', ['posts' => $post]);

    }
    function destroy($id){
       $post = Post::where('id','=',$id)->firstOrFail();
       $post->destroy($id);
       return redirect()->route('posts.index');
    }
    function edit($id){
        $post = Post::find($id);
        return view('posts.edit',[
            'post'=>$post,'id'=>$id
        ]);
    }
    function update($id){
        $post= Post::find($id)->firstOrFail();
        $post ->title = request()->title;
        $post ->content=request()->content;
  
        $post->save();

        // return $post;
     
        // $post-> update($post->all());
        return redirect()->route('posts.index');

    }
  
}
