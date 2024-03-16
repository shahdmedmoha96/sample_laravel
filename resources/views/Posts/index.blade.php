@extends('layouts.app')
@section('title') Index @endsection
@section('content')
<div class="mt-4 container d-flex justify-content-around">
    <a href={{route('posts.create')}} class="btn btn-success">Create Post</a>

        <div class="row">
            <form action="{{route('posts.search')}}" method="GET">
                @csrf
                <div class="input-group">
                    <input  name="search" class="form-control py-2  mr-1 pr-5" type="search" placeholder="Search " value="{{request()->search}}" >

                    <button    type="submit" class="btn btn-primary py-2  mr-1 pr-5">Search</button>
        </div>
    </form>
</div>
</div>
<div class="container">
<table class="table mt-4">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Title </th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col"> Action</th>
    </tr>
  </thead>
  <tbody>
      {{-- @dd($posts); --}}
      @foreach ($posts as $post)
      <tr>
          <td scope="row">{{ $post['id'] }}</td>
          <td>{{ $post['title'] }}</td>
          {{--  or   <td>{{ $post->title }}</td> --}}
          <td>{{  $post->user ? $post->user->name : 'not found'}}</td>
          <td>{{ $post->user ? $post->user->created_at->format('Y-m-d') : 'not found' }}</td>
          <td><div class="buttons d-flex">
              <a href=" {{route('posts.show',$post['id'])}}" class="btn btn-info ms-2" >View</a>
              <a  href="{{route('posts.edit',$post['id'])}} "class="btn btn-primary ms-2">Edit</a>
              <form method="POST" action="{{route('posts.destory',$post['id'])}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger ms-2">Delete</button>
            </form>
              </div></td>
        </tr>
      @endforeach


  </tbody>
</table>
</div>
@endsection

