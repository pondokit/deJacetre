<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Comment;

class CommentsController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
    	$data = $request->all();

    	Comment::create($data);

    	return redirect()->back()->with('message', 'Your comment successfully send.');
    }
}
