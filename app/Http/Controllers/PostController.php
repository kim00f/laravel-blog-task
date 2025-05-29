<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletepost(post $post){
        if($post->user_id === auth()->user()->id){
          $post->delete();
        }
          return redirect('/');

    }
    public function updatepost(post $post, Request $request){
        if($post->user_id !== auth()->user()->id){
            return redirect('/');
        }
        $infields = $request->validate([
            "title"=> "required",
            "content"=> "required",
        ]);
        $post->update($infields);
        return redirect("/");



    }
    public function showeditpost(post $post){
        if($post->user_id !== auth()->user()->id){
            return redirect('/');
        }
        return view("edit-post", ["post"=> $post]);

    }
    public function createpost(Request $request){


        $infields = $request->validate([
            "title"=> "required",
            "content"=> "required",
        ]);
        $infields['user_id']= auth()->user()->id;
        Post ::create($infields);
        return redirect('/');
    }
}
