<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Storage;

use Illuminate\Http\Request;
use App\Post; // -> /providers/Post.php , this is the namespace

class PostController extends Controller
{
    function create(){
        return view('posts.create');
    }
    function store(StorePostRequest $request){
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$request->file('image')->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->storeAs('public/upload',$filename);
        }
  
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $filename;
        $post->user_id =$request->user()->id;
        $post->save();
       
        return redirect('/posts');


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
            'post'=>$post,
        ]);
    }
    function update($id, StorePostRequest $request){
        
        $post= Post::find($id)->firstOrFail();
        $post ->title = $request->title;
        $post ->content=$request->content;
        $post->slug=$request->slug;

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$request->file('image')->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->storeAs('public/upload',$filename);
        }
        $post->image = $filename;
      
        $post->save();
        return redirect()->route('posts.index');
        

    }
}

