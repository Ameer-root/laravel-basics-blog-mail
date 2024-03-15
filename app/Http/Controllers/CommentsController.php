<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store(StoreComment $request, Post $post)
    {
        Comment::create([
            'name' => request('name'),
            'body' => request('body'),
            'post_id' => $post->id,
        ]);

        return back();
    }
}
