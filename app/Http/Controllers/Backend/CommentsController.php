<?php

namespace App\Http\Controllers\Backend;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use App\Comment;
use App\Post;


class CommentsController extends BackendController
{
    public function index()
    {
      $comments = Comment::with('post')->paginate(10);

      return view('backend.comments.index', compact('comments'));
    }

    public function edit($id)
    {

      $comments = Comment::findOrFail($id);

      return view('backend.comments.edit', compact('comments'));

    }

    public function update(CommentStoreRequest $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());

        Toastr::success('Comments was updated successfully!', 'Update Comments');

        return redirect('backend/comments');
    }

    public function destroy(Request $request, $id)
    {
        Post::withTrashed()->where('id', $id);

        $comments = Comment::findOrFail($id);
        $comments->delete();

        Toastr::success('Comment was deleted successfully!', 'Delete Comment');

        return redirect('backend/comments');
    }
}
