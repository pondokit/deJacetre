<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Contact;

class ContactController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::find(1);

        return view('backend.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        Contact::find(1)->update($request->all());

        Toastr::success('Contact was updated successfully!', 'Update Contact');

        return redirect('/backend/contact');
    }
}
