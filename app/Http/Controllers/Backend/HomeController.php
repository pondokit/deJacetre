<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use Laravolt\Avatar\Facade as Avatar;
use App\User;

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
        $gambar = str_random(10).".png";
        Avatar::create($request->name)->save("image/".$gambar);

        $user = $request->user();

        foreach ($user->roles as $role) {
            $role_id[] = $role->id;
            $role_name[] = $role->display_name;
        }

        return view('backend.home.edit', compact('user', 'role_id', 'role_name'));
    }

    public function update(Requests\AccountUpdateRequest $request)
    {
        // $gambar = str_random(10).".png";
        // Avatar::create($request->name)->save("image/".$gambar);

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
