<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\User;
use App\Post;
use Session;

class BlogController extends BackendController
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
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

        $statusList = $this->statusList($request);

        Session::forget('author');
        Session::forget('category');

        Session::put('status', $request->get('status'));
        Session::put('author', $request->get('author'));
        Session::put('category', $request->get('category'));

        if (session('status') == 'trash') {
            $onlyTrashed = TRUE;
        }

        $category = new Category();
        $category_data = $category->pluck('title','id');

        $author = new User();
        $author_data = $author->pluck('name','id');

        return view('backend.blog.index', compact('onlyTrashed','statusList', 'category', 'category_data', 'author', 'author_data' ));
    }

    private function statusList($request)
    {
        return [
            'own'       => $request->user()->posts()->count(),
            'all'       => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft'     => Post::draft()->count(),
            'trash'     => Post::onlyTrashed()->count(),
        ];
    }

    public function data()
    {
        if (session('author') !== null || session('category') !== null) {

            $author = (session('author') !== null) ? session('author') : null;
            $category = (session('category') !== null) ? session('category') : null;

            if (empty($author)) {
                $filter = array(['category_id', $category]);
            } else if (empty($category)) {
                $filter = array(['author_id', $author]);
            } else {
                $filter = array(['author_id', $author], ['category_id', $category]);
            }

            $posts = Post::with('author','category')->where($filter);
        } else {
            $posts = new Post();
        }

        if (($status = session('status')) && $status == 'trash') {
            $posts       = $posts->onlyTrashed()->with('author','category');
        } else if ($status == 'published') {
            $posts       = $posts->published()->with('author','category');
        } else if ($status == 'scheduled') {
            $posts       = $posts->scheduled()->with('author','category');
        } else if ($status == 'draft') {
            $posts       = $posts->draft()->with('author','category');
        } else if ($status == 'own') {
            // $posts       = request()->user()->posts()->with('author','category');
            $posts       = $posts->with('author','category')->where('author_id', request()->user()->id);
        } else {
            $posts       = $posts->with('author','category');
        }

        return Datatables::of($posts)
            ->addColumn('action', function($post) {

                $request = request();

                if (session('status') == 'trash') {

                    $edit_button = (check_user_permissions($request, "Blog@restore", $post->id)) ? '<button title="Restore" class="btn btn-xs btn-default"><i class="fa fa-refresh"></i></button>' : '<button title="Restore" onclick="return false" class="btn btn-xs btn-default disabled"><i class="fa fa-refresh"></i></button>';

                    $delete_button  = (check_user_permissions($request, "Blog@forceDestroy", $post->id)) ? '<button title="Delete Permanent" onclick="return confirm('."You are about to delete a post permanently. Are you sure?".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>' : '<button title="Delete Permanent" onclick="return false" type="button" class="btn btn-xs btn-danger disabled"><i class="fa fa-times"></i></button>';

                    $edit_form = '<form style="display: inline-block;" action="'.route('blog.restore', $post->id).'" method="post">' . csrf_field() . method_field("PUT") . $edit_button .'</form>';

                    $delete_form = '<form style="display: inline-block;" action="'.route('blog.force-destroy', $post->id).'" method="post">' . csrf_field() . method_field("DELETE") . $delete_button .'</form>';

                    return  $edit_form . $delete_form;

                } else {

                    $edit_button = (check_user_permissions($request, "Blog@edit", $post->id)) ? '<a href="' . route('blog.edit', $post->id) . '" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>' : '<button class="btn btn-xs btn-default disabled"><i class="fa fa-edit"></i></button>';

                    $delete_button  = (check_user_permissions($request, "Blog@destroy", $post->id)) ? '<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>' : '<button type="button" onclick="return false" class="btn btn-xs btn-danger disabled"><i class="fa fa-trash"></i></button>';

                    return '<form action="'.route('blog.destroy', $post->id).'" method="post">' . csrf_field() . method_field("DELETE") . $edit_button . $delete_button .'</form>';
                }

            })
            ->addColumn('author', function($post) {
                return $post->author->name;
            })
            ->addColumn('category', function($post) {
                return $post->category->title;
            })
            ->addColumn('label', function($post) {
                return (session('status') != 'trash') ? "<abbr title='".$post->dateFormatted(true)."'></abbr>".$post->publicationLabel() : "<abbr title='".$post->dateFormatted(true)."'>".$post->dateFormatted()."</abbr>";
            })
            // ->addColumn('date', function($post) {
            //     return $post->dateFormatted(true);
            // })
            // ->addColumn('label', function($post) {
            //     return $post->dateFormatted();
            // })
            // ->addColumn('status', function($post) {
            //     return (session('status') != 'trash') ? "<abbr title='".$post->dateFormatted(true)."'></abbr>".$post->publicationLabel() : "<abbr title='".$post->dateFormatted(true)."'>".$post->dateFormatted()."</abbr>";
            // })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('backend.blog.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        if($request->check == 'publish') {
            $request->validate([
                'published_at' => 'date_format:Y-m-d H:i:s'
            ]);
        } else {
            unset($request['published_at']);
        }

        $data = $this->handleRequest($request);
        $newPost = $request->user()->posts()->create($data);

        $newPost->createTags($data["post_tags"]);

        Toastr::success('Your post was created successfully!', 'Create Post');

        return redirect('backend/blog');
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
        $post = Post::findOrFail($id);
        return view('backend.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        if($request->check == 'publish') {
            $request->validate([
                'published_at' => 'date_format: Y-m-d H:i:s'
            ]);
        } else {
            unset($request['published_at']);
        }

        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->handleRequest($request);
        $post->update($data);
        $post->createTags($data['post_tags']);

        if ($oldImage !== $post->image) {
            $this->removeImage($oldImage);
        }

        Toastr::success('Your post was updated successfully!', 'Update Post');

        return redirect('backend/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        $trash = '<form action="'.route('blog.restore', $id).'" method="post">'.csrf_field().method_field('PUT').'<button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-undo"></i> Undo</button"></form>';

        Toastr::info("Your post was removed to trash!".$trash, 'Delete Post');

        return redirect('/backend/blog');
    }

    public function forceDestroy($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();

        $this->removeImage($post->image);

        Toastr::success('Your post has been deleted successfully!', 'Permanent Delete Post');

        return redirect('/backend/blog?status=trash');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        Toastr::success('Your post has been moved from the Trash!', 'Restore Post');

        return redirect()->back();
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
