<?php

namespace App\Views\Composers;

use Illuminate\View\View;
use App\Sosmed;

class GlobalComposer
{
	public function compose(View $view)
	{
		$this->composeSosmeds($view);
	}

	private function composeSosmeds(View $view)
	{
		$sosmeds = Sosmed::find(1);

		$view->with('sosmeds', $sosmeds);
	}
}