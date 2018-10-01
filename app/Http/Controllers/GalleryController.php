<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
    	$gallery = Gallery::all();

    	return view('blog.gallery', compact('gallery'));
    }
}
