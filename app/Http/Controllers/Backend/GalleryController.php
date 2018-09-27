<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests;
use App\Gallery;


class GalleryController extends BackendController
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
        $gallery = Gallery::paginate(5);
        return view('backend.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = new Gallery();
        return view('backend.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\GalleryStoreRequest $request)
    {

        $data = $this->handleRequest($request);

        Gallery::create($data);

        Toastr::success('New Image was created successfully!','Create Image');
        return redirect('backend/gallery');
    }

    private function handleRequest($request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $extension   = $image->getClientOriginalExtension();
            $randName    = rand(11111, 99999).'.'.$extension;
            $destination = $this->uploadPath;

            $successUploaded = $image->move($destination,$randName);

            if ($successUploaded) {
                $width      = config('cms.image.thumbnail.width');
                $height      = config('cms.image.thumbnail.height');
                $thumbnail  = str_replace(".{$extension}", "_thumb.{$extension}", $randName);

                Image::make($destination.'/'.$randName)
                    ->resize($width, $height)
                    ->save($destination.'/'.$thumbnail);
            }

            $data['image'] = $randName;
        }

        return $data;
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
        $gallery = Gallery::findOrFail($id);

        return view('backend.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\GalleryUpdateRequest $request, $id)
    {
        Gallery::findOrFail($id)->update($request->all());
        
        Toastr::success('Gallery was updated successfully!', 'Update Gallery');
        return redirect('backend/gallery');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\GalleryDestroyRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        $this->removeImage($gallery->image);

        Toastr::success('Gallery was deleted successfully!', 'Delete Gallery');

        return redirect('backend/gallery');

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
