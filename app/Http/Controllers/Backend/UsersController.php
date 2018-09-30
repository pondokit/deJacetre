<?php

namespace App\Http\Controllers\Backend;

use Brian2694\Toastr\Facades\Toastr;
use Yajra\Datatables\Datatables;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Post;
use File;

class UsersController extends BackendController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index');
    }

    public function data()
    {
        $users = User::with('posts');

        return Datatables::of($users)
            ->addColumn('action', function($user) {
                $delete_button  = ($user->id == config('cms.default_user_id') || $user->id == auth()->user()->id) ? '<button onclick="return false" class="btn btn-xs btn-danger disabled"><i class="fa fa-times"></i></button>' : '<a href="'.route('users.confirm', $user->id).'" onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';

                return '<a href="'.route('users.edit', $user->id).'" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>'. $delete_button;
            })
            ->addColumn('post_count', function($user) {
                return $user->posts->count();
            })
            ->addColumn('roles', function($user) {
                foreach ($user->roles as $role) {
                    $roles[] = $role->name;
                }

                return $user->roles->count() !== 0 ? implode(", ", $roles) : "-";
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        foreach ($user->roles as $role) {
            $role_id[] = $role->id;
            $role_name[] = $role->display_name;
        }

        return view('backend.users.create', compact('user', 'role_id', 'role_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {

        if (File::exists('/image/')) {
          Storage::makeDirectory('/image/', 777, true);
        } else {
          File::makeDirectory(public_path().'/image/');
        }
        //avatar
        $gambar = str_random(10).".png";
        Avatar::create($request->name)->save("image/".$gambar);

        $request->merge([
            'password' => bcrypt($request->password),
            'image' => $gambar,
        ]);

        $user = User::create($request->all());

        $user->attachRoles($request->roles);
        Toastr::success('New user was created successfully!', 'Create User');

        return redirect('backend/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($user->roles()->count()) {
            foreach ($user->roles as $role) {
                $role_id[] = $role->id;
                $role_name[] = $role->display_name;
            }
        } else {
            $role_id = null;
            $role_name = null;
        }

        return view('backend.users.edit', compact('user', 'role_id', 'role_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        if (empty($request->password)){
            unset($request['password']);
        } else {
            $request->merge([
              'password' => bcrypt($request->password),
            ]);
        }

        $user = User::findOrFail($id);

        if ($request->name !== $user->name) {
          if (file_exists('/image/$user->image')) {
            unlink('/image/$user->image');
          }

          $gambar = str_random(10).".png";
          Avatar::create($request->name)->save("image/".$gambar);

          $request->merge([
            'image' => $gambar,
          ]);
        }

        $user->update($request->all());

        $message = [
            'type' => 'success',
            'msg'  => 'User was updated successfully!'
        ];

        if ($id != config('cms.default_user_id'))
        {
            $user->detachRoles();
            $user->attachRoles($request->roles);
        }
        elseif ($request->role != 1)
        {
            $message['type'] = 'error';
            $message['msg']  = "You can't change the default user role's";
        }

        Toastr::{$message['type']}($message['msg'],'Update User');

        return redirect('backend/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if ($deleteOption == "delete")
        {
            $count = $user->posts()->withTrashed()->count();

            for ($i = 0; $i < $count; $i++){
                $image = $user->posts()->withTrashed()->first()->image;
                $user->posts()->withTrashed()->first()->forceDelete();
                $this->removeImage($image);
            }
        }
        elseif ($deleteOption == "attribute")
        {
            $user->posts()->withTrashed()->update(['author_id' => $selectedUser]);
        }

        $user->delete();

        Toastr::success('User was deleted successfully!', 'Delete User');

        return redirect('backend/users');
    }

    public function confirm(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');

        return view('backend.users.confirm', compact('user','users'));
    }

    private function removeImage($image)
    {
        if ( ! empty($image) ) {

            $imagePath = $this->uploadPath.'/'.$image;
            $ext = substr(strrchr($image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath.'/'.$thumbnail;

            if ( file_exists($imagePath) ) unlink($imagePath);
            if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
        }
    }
}
