@extends('layouts.app')
@section('content')
<div class="card" >
  <div class="card-body">
    <h5 class="card-title ">{{$posts->title}}</h5>
    <p class="card-text">{{$posts-> content}}</p>
  </div>
</div>
@endsection('content')