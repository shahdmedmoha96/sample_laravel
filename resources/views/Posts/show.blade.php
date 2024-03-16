@extends('layouts.app')
@section('title' )Show @endsection
@section('content')
    <div class="container mt-4">
        <div class="card ">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title"> Title: {{ $post->title }}</h5>
                <p class="card-text">Description: {{$post->description}}</p>

            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                Post Create Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'not found'}}</h5>
                <p class="card-text">Email: {{$post->user ? $post->user->email: 'not found'}}</p>
                <p class="card-text">Created At: {{$post->user ? $post->user->created_at: 'not found'}}</p>
            </div>
        </div>
        <form class=" mt-5" action="{{route('posts.comment')}}" method="GET">
            <label for="">Add Your Comment</label>
        <textarea class="form-control"  name="comment"></textarea>
       <div class="text-end"> <button type="submit" class="btn btn-primary mt-3 ">Comment</button></div>
    </form>
    <p>@isset($comment)
{{$comment}}
    @endisset</p>
    </div>
@endsection
