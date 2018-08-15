<?php

namespace App\Views\Composers;

use Illuminate\View\View;
use App\Post;

class CustomComposer
{
	public function compose(View $view)
	{
		$this->composeSlider($view);
	}

	private function composeSlider(View $view)
	{
		$slider = Post::published()->popular()->take(5)->get();
		$view->with('slider', $slider);
	}
}