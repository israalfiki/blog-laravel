@extends('layouts.app')
@section('content')
<div class="text-center m-2">
<form action="/posts" method="post">
<a class="btn btn-success btn-lg" style="align:center;" href="posts/create" role="button">Create Post</a>


</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col"> Created by</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $index => $value)  
        <tr>
        <th scope="row">{{$value['id']}}</th>
            <td>{{$value['title']}}</td>
            <td>{{$value['slug']}}</td>
            <td>{{$value->user->name}}</td>
            <td>{{ date('Y-m-d', strtotime($value['created_at'])) }}</td>
            <td><a class="btn btn-primary"href="{{route('posts.show',['post' => $value['id'] ])}}">View</a>

            <a  class="btn btn-warning" href="{{route('posts.edit',['post' => $value['id'] ])}}">Edit</a>
            <form style="display:inline;" action="{{ route('posts.destroy', ['post' => $value['id']]) }}" method="post">
              <input onclick=' return confirm("Are you sure?")' class="btn btn-danger" type="submit" value="Delete" />
               @method('delete')
               @csrf
               </form>
            </td>
          </tr>
  @endforeach
  </tbody>
</table>
{{$posts->links()}}

@endsection('content')

