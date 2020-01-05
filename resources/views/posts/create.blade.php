@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/posts">
    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
    @csrf

  <div class="form-group">
    <label >Title</label>
    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label>Content</label>
    <input name="content" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input name="content" type="file" class=" btn form-control-file" accept="image/jpg,image/png">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection('content')