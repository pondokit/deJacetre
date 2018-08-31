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

    public function data()
    {
        // $categories = Category::with('posts');
        
        // return Datatables::of($categories)
        //         ->addColumn('action', function($category) {
        //             $delete_button  = ($category->id == config('cms.default_category_id')) ? '<button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled"><i class="fa fa-times"></i></button>' : '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';

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
        // $category = Category::findOrFail($id);
        // return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
        // Category::findOrFail($id)->update($request->all());

        // Toastr::success('Category was updated successfully!', 'Update Category');

        // return redirect('backend/categories');
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
