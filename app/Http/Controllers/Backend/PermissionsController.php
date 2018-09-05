<?php

namespace App\Http\Controllers\Backend;

use Brian2694\Toastr\Facades\Toastr;
// use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permission;
// use App\Post;

class PermissionsController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.permissions.index', compact('permissions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = new Permission();
        return view('backend.permissions.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PermissionStoreRequest $request)
    {
        Permission::create($request->all());

        Toastr::success('New permission was created successfully!','Create Permission');

        return redirect('backend/permissions');
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
        $permission = Permission::findOrFail($id);
        return view('backend.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PermissionUpdateRequest $request, $id)
    {
        Permission::findOrFail($id)->update($request->all());

        Toastr::success('Permission was updated successfully!', 'Update Permission');

        return redirect('backend/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\PermissionDestroyRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        Toastr::success('Permission was deleted successfully!', 'Delete Permission');

        return redirect('backend/permissions');
    }
}
