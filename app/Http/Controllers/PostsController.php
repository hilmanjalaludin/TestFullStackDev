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
        // $posts = Posts::latest()->get();
        $posts = User::
                join('posts', 'users.id', '=', 'posts.user_id')
                ->join('comments', 'comments.post_id', '=', 'posts.id')
               ->get(['users.*', 'posts.content','comments.comment']);
        return view('posts.index', compact('posts'));
    }

    public function ContentPost()
    {
        // $posts = Posts::latest()->get();
        $posts = User::
                join('posts', 'users.id', '=', 'posts.user_id')
                // ->join('comments', 'comments.post_id', '=', 'posts.id')
               ->get(['users.*', 'posts.*']);
        return view('posts.contentpost', compact('posts'));
    }
   
    public function CommentGuest()
    {
        // $posts = Posts::latest()->get();
        $posts = User::
                    join('posts', 'users.id', '=', 'posts.user_id')
                    ->join('comments', 'comments.post_id', '=', 'posts.id')
                    ->whereNull('comments.name')
                    ->get(['users.*', 'posts.content','comments.comment']);
        return view('posts.comguest', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'content' => 'required'
        ]);
        $user_id = 1;
        $post = Posts::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user_id,
            'slug' => Str::slug($request->title)
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'content' => 'required'
        ]);

        $post = Posts::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title)
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

}
