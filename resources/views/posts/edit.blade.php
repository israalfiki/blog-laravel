@extends('layouts.app')
@section('content')
<form method="post" action="/posts/{{$post->id}}" enctype="multipart/form-data">
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
  <div class="form-group">
    <label>Image</label>
    <input name ="image" type="file" class=" btn form-control-file" accept="image/jpg,image/png">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>

</form>
@endsection('content')