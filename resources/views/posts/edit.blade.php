@extends('layouts.app')
@section('content')
<form method="post" action="/posts/{{$post->id}}">
@method('patch')
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input value="{{$post->title}}" name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Body</label>
    <input  value="{{$post->content}}"name="content" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection('content')