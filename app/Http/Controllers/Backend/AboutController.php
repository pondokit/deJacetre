<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\About;

class AboutController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::find(1);
        return view('backend.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        About::findOrFail(1)->update($request->all());

        Toastr::success('Your about page has been updated!', 'Congrats');

        return redirect('/backend/about');
    }
}
