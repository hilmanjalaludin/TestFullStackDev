<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function UserList()
    {
        $posts = User::
                join('posts', 'users.id', '=', 'posts.user_id')
                ->join('comments', 'comments.post_id', '=', 'posts.id')
               ->get(['users.*', 'posts.content','comments.comment']);
        return view('posts.index', compact('posts'));
    }

    public function ContentPost()
    {
        $posts = User::
                join('posts', 'users.id', '=', 'posts.user_id')
               ->get(['users.*', 'posts.*']);
        return view('posts.contentpost', compact('posts'));
    }
   
    public function CommentGuest()
    {
        $posts = User::
                    join('posts', 'users.id', '=', 'posts.user_id')
                    ->join('comments', 'comments.post_id', '=', 'posts.id')
                    ->whereNull('comments.name')
                    ->get(['users.*', 'posts.content','comments.comment']);
        return view('posts.comguest', compact('posts'));
    }
    
    public function PostsObserver()
    {
        $posts = Posts::create([
            'title' => 'Platinum 1',
            'slug' => 10,
            'user_id' => 2,
            'content' => 10
        ]);
  
    }

}
