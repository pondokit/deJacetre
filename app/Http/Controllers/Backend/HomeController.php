<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;

class HomeController extends BackendController
{
    /**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        return view('backend.home.index');
    }

    public function edit(Request $request)
    {
        $user = $request->user();
        return view('backend.home.edit', compact('user'));
    }

    public function update(Requests\AccountUpdateRequest $request)
    {
        $user = $request->user();

        if ($request->password == null) {
        	unset($request['password']);
        }

        $user->update($request->all());
        
        $message = [
            'type' => 'message',
            'msg'  => 'User was updated successfully!'
        ];

        if ($request->role != 1) 
        {
            $message['type'] = 'error-message';
            $message['msg']  = "You can't change the default user role's";
        }

        return redirect()->back()->with($message['type'], $message['msg']);
    }
}
