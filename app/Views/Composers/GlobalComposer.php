<?php

namespace App\Views\Composers;

use Illuminate\View\View;
use App\Contact;

class GlobalComposer
{
	public function compose(View $view)
	{
		$this->composeSosmeds($view);
	}

	private function composeSosmeds(View $view)
	{
		$sosmeds = Contact::find(1);

		$view->with('contact', $sosmeds);
	}
}
