<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class postController extends Controller
{
    public function savepost(Request $request){
        $fields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $fields['title'] = strip_tags($fields['title']);
        $fields['bosy'] = strip_tags($fields['body']);
        $fields['user_id'] = auth()->id();

        Post::create($fields);

        return redirect('/home');
    }

    public function show(Post $id){
        $post = $id->getAttributes();
        // dd($post['user_id']);
        $user = User::where('id', $post['user_id'])->get();
        $user = $user[0]->getAttributes();
        return view('posts.show', ['post'=> $post, 'user' => $user, 'authuser' => auth()->user()->id]);
    }

    public function showedit (Post $post) {
        return view('editpost', ['post' => $post]);
    }

    public function edit (Post $post, Request $request) {
  
        $fields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $fields['title'] = strip_tags($fields['title']);
        $fields['bosy'] = strip_tags($fields['body']);

        $post->update($fields);
        return redirect('/myposts');
    
    }

    public function delete (Post $post) {
        $post->delete();
        return redirect('/myposts');
    }
}
