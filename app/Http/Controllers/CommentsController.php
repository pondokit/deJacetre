<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Events\NewComment;
use App\Comment;

class CommentsController extends Controller
{

    public function store(CommentStoreRequest $request)
    {
    	$data = $request->all();
    	$author = $request->author_name;
    	$comment = $request->body;

    	event(new NewComment($author, $comment));

    	Comment::create($data);

    	return redirect()->back()->with('message', 'Your comment successfully send.');
    }
}
