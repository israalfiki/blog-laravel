@extends('layouts.app')
@section('content')
<a class="btn btn-primary" style="align:center;" href="posts/create" role="button">Create Post</a>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
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
            <td>{{$value->user->name}}</td>
            <td>{{ date('Y-m-d', strtotime($value['created_at'])) }}</td>
            <!-- <td><a href="">View</a> -->
            <td><a href="{{route('posts.show',['post' => $value['id'] ])}}">View</a>

            <a href="{{route('posts.edit',['post' => $value['id'] ])}}">Edit</a>
            <form action="{{ route('posts.destroy', ['post' => $value['id']]) }}" method="post">
              <input onclick=' return confirm("Are you sure?")' class="btn btn-default" type="submit" value="Delete" />
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

