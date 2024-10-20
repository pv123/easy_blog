<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        // validate incoming request data
        $this->validate(request(), [
            'new_comment' => 'required|min:1|max:255'
        ]);

        // store comment
        $post->comments()->create([
            'user_id'   => auth()->id(),
            'comment'      => request()->new_comment
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();

    }
}
