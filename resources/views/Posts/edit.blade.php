@extends('layouts.app')
@section('title') Edit @endsection
@section('content')
<div class="container">
    <form method="POST"  action={{route('posts.updata',$post->id)}}>
        {{--  for security--}}
        @csrf
        @method('PUT')
        @if ($errors->any())
        <div class="alert alert-danger mt-3 ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="mb-3">
          <label  class="form-label"> Title</label>
          <input name="title" type="text" class="form-control"  value="{{$post->title}}">
        </div>
        <div class="mb-3">
          <label  class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3" >{{$post->description}}</textarea>
        </div>
        <label  class="form-label"> Post Create</label>
        <select name="post_Creator" class="form-select mb-3 "  >
            @foreach ($users as $user)
            <option value="{{$user->id}}" @selected($user->id==$post->user_id) >{{$user->name}}</option>
            @endforeach
          </select>
        <button  type='submit' class="btn btn-primary">Updata</button>
        
      </form>
</div>
@endsection

