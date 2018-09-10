<?php

namespace App\Http\Controllers\Backend;

use Brian2694\Toastr\Facades\Toastr;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Role;
use App\Permission;
// use App\Post;

class RolesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.roles.index');
    }

    public function data()
    {
        $roles = Role::all();

        return Datatables::of($roles)
                ->addColumn('action', function($role) {
                    $delete_button  = ($role->id == config('cms.default_role_id')) ? '<button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled"><i class="fa fa-times"></i></button>' : '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';

                    return '<form action="'.route('roles.destroy', $role->id).'" method="post">' . csrf_field() . method_field("DELETE") . '<a href="'.route('roles.edit', $role->id).'" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>'. $delete_button .'</form>';
                })
                ->addColumn('permissions', function($role) {
                    foreach ($role->permissions as $permission) {
                        $permissions[] = $permission->name;
                    }

                    return $role->permissions->count() !== 0 ? implode(", ", $permissions) : "-";
                })
                ->addColumn('user_count', function($role) {
                    return $role->users->count();
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
        $role = new Role();

        foreach ($role->permissions as $permission) {
            $permission_id[] = $permission->id;
            $permission_name[] = $permission->name;
        }

        return view('backend.roles.create', compact('role', 'permission_id', 'permission_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RoleStoreRequest $request)
    {
        $request->merge([
            'name' => strtolower($request->name),
            'display_name' => title_case($request->name),
        ]);

        $role = Role::create($request->all());

        $role->attachPermissions($request->permissions);

        Toastr::success('New role was created successfully!','Create Role');

        return redirect('backend/roles');
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
        $role = Role::findOrFail($id);

        if ($role->permissions()->count()) {
            foreach ($role->permissions as $permission) {
                $permission_id[] = $permission->id;
                $permission_name[] = $permission->name;
            }
        } else {
            $permission_id   = null;
            $permission_name = null;
        }

        return view('backend.roles.edit', compact('role', 'permission_id', 'permission_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\RoleUpdateRequest $request, $id)
    {
        $request->merge([
            'name' => strtolower($request->name),
            'display_name' => title_case($request->name),
        ]);

        $role = Role::findOrFail($id);

        $role->update($request->all());

        $role->detachPermissions();
        $role->attachPermissions($request->permissions);

        Toastr::success('Role was updated successfully!', 'Update Role');

        return redirect('backend/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\RoleDestroyRequest $request, $id)
    {
        Role::findOrFail($id)->detachPermissions()->delete();

        Toastr::success('Role was deleted successfully!', 'Delete Role');

        return redirect('backend/roles');
    }
}
