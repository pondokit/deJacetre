<?php

namespace App\Views\Composers;

use Illuminate\View\View;
use App\Comment;

class RegisterComposer
{
	public function compose(View $view)
	{
		$this->composeComment($view);
	}

	private function composeComment(View $view)
	{
		$comment = Comment::where("is_read", 0)->get();
		$view->with('comment', $comment);
	}
}
