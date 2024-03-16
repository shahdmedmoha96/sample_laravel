<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use App\Models\User;

class Controller extends BaseController
{

    public function index(){

        $postFromeDB=Post::all();
        // dd($allposts);
        return view(('Posts.index' ),['posts'=>$postFromeDB]);
    }


    // public function show($post_id){
    public function show(Post $post ){  //بتجيب الصف الي عتيزه من غير ما ستخدم id و كمان بتعمل عمل if

        // $siglePostFromeDB=post::find($post_id);
        // or $siglePostFromeDB=post::where('id',$post_id)->first();
        // or $siglePostFromeDB=post::where('id',$post_id)->get();


        // if(isNull($siglePostFromeDB)){
        //     return to_route('posts.index');
        // }     or
        // $siglePostFromeDB=post::findOrFail($post_id);  //بتعمل نفس عمل if


        // return view(('Posts.show' ),['post'=>$siglePostFromeDB]);
        return view(('Posts.show' ),['post'=>$post]);

    }



public function create(){
     $users=User::all();

// dd($users);
        return view(('Posts.create') ,['users'=>$users]);
    }

 public function store(){
// to validate data
request()->validate([
    'title' => ['required', 'min:3'],
    'description' => ['required' , 'min:5'],
    'post_Creator' => ['required','exists:users,id'],
]);
$title=request()->title;
$description=request()->description;
$post_Create=request()->post_Creator;

$post=new Post;
$post->title=$title;
$post->description=$description;
$post->user_id=$post_Create;
$post->save();


return to_route('posts.index');

    }
public function edit(Post $post){
$users=User::all();
//    dd(user::findOrFail(auth()->user()->id));
        return view(('posts.edit'),['users'=>$users,'post'=>$post]);
    }


    public function updata($post_id){
 //1- get the user data
 $title=request()->title;
$description=request()->description;
$post_Create=request()->post_Creator;

// to be validata data
request()->validate([
    'title' => ['required', 'min:3'],
    'description' => ['required' , 'min:5'],
    'post_Creator' => ['required','exists:users,id'],
]);


$siglePostFromeDB=Post::find($post_id);
$siglePostFromeDB->update([
    'title'=>$title,
    'description'=>$description,
    'user_id'=>$post_Create

]);
        return to_route(('posts.show'),$post_id);
    }
    public function destory(Post $post){
$post->delete();
        return to_route('posts.index');
    }





 public function search(){
       $search=request()->search;
       $posts=Post::where('title','like',"%$search%")->get();
       return view(('Posts.index' ),['posts'=>$posts]);

    }
 public function comment(Post $post){
$comment=request()->comment;
// dd($comment);
        return view(('Posts.show' ),['post'=>$post,'comment'=>$comment]);

     }
}
