<?php

namespace App\Http\Controllers\Backend;

use Brian2694\Toastr\Facades\Toastr;
// use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Role;
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
        $roles = Role::all();

        return view('backend.roles.index', compact('roles'));
    }

    public function data()
    {
        // $categories = Category::with('posts');
        //
        // return Datatables::of($categories)
        //         ->addColumn('action', function($category) {
        //             $delete_button  = ($category->id == config('cms.default_category_id')) ? '<button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled"><i class="fa fa-times"></i></button>' : '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';
        //
        //             return '<form action="'.route('categories.destroy', $category->id).'" method="post">' . csrf_field() . method_field("DELETE") . '<a href="'.route('categories.edit', $category->id).'" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>'. $delete_button .'</form>';
        //         })
        //         ->addColumn('post_count', function($category) {
        //             return $category->posts->count();
        //         })
        //         ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        return view('backend.roles.create', compact('role'));
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

        Role::create($request->all());

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
        return view('backend.roles.edit', compact('role'));
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

        Role::findOrFail($id)->update($request->all());

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
        Role::findOrFail($id)->delete();

        Toastr::success('Role was deleted successfully!', 'Delete Role');

        return redirect('backend/roles');
    }
}
