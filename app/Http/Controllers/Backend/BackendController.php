<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
	protected $limit = 5;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_permissions');
    }

    public function error403()
    {
        $name = session('page')['name'];
        $title = (session('page')['title'] == 'user') ? session('page')['title'].' or delete yourself' : session('page')['title'];

        return redirect('/backend/'.$name)->with('error-message','You cannot delete default '.$title.'!');
    }
}
