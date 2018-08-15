<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
use App\Tag;

class BlogController extends Controller
{
    protected $limit = 3;
				
    public function index()
    {
    	// $posts = Post::with('author', 'comments')->orderBy('created_at','desc')->get();
    	// $posts = Post::with('author', 'comments')->latest()->get();
    	$posts = Post::with('author', 'comments', 'tags', 'category')
							->latestFirst()
                            ->published()
                            ->filter(request()->only(['term', 'year', 'month']))
                            ->paginate($this->limit);

    	return view('blog.index', compact('posts'));
    }

    public function category(Category $category)
    {
        // $posts = Post::with('author', 'comments')->orderBy('created_at','desc')->get();
        // $posts = Post::with('author', 'comments')->latest()->get();
        // $posts = Post::with('author', 'comments')
        //                     ->published()
        //                     ->latestFirst()
        //                     ->where('category_id',$id)
        //                     ->simplePaginate($this->limit);

        $categoryName = $category->title;

        $posts = $category->posts()
                            ->with('author', 'comments', 'tags', 'category')
                            ->published()
                            ->latestFirst()
                            ->simplePaginate($this->limit);
                            
        return view('blog.index', compact('posts', 'categoryName'));
    }

    public function tag(Tag $tag)
    {
        $tagName = $tag->name;

        $posts = $tag->posts()
                    ->with('author', 'comments', 'tags', 'category')
                    ->published()
                    ->latestFirst()
                    ->simplePaginate($this->limit);
                            
        return view('blog.index', compact('posts', 'tagName'));
    }

    public function author(User $author)
    {
        $authorName = $author->name;

        $posts = $author->posts()
                            ->with('category', 'comments', 'tags', 'category')
                            ->published()
                            ->latestFirst()
                            ->simplePaginate($this->limit);
                            
        return view('blog.index', compact('posts', 'authorName'));
    }

    public function show(Post $post)
    {
        // update posts set view_count = view_count + 1 where id = ?

        # 1
        // $viewCount = $post->view_count + 1;
        // $post->update(['view_count' => $viewCount]);

        #2
        $post->increment('view_count');

        $postComments = $post->comments()->simplePaginate(3);

        return view('blog.show', compact('post', 'postComments'));
    }
}
