<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Sosmed;

class SosmedController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosmeds = Sosmed::find(1);

        return view('backend.sosmeds.edit', compact('sosmeds'));
    }

    public function update(Request $request)
    {
        Sosmed::find(1)->update($request->all());

        Toastr::success('Sosmed was updated successfully!', 'Update Sosmed');  

        return redirect('/backend/sosmeds'); 
    }
}
