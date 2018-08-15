<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Post;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
        	[
                'title' => 'Uncategorized',
                'slug'  => 'uncategorized'
            ],
            [
                'title' => 'Tips and Tricks',
                'slug'  => 'tips-and-tricks'
            ],
        	[
        		'title'	=> 'Build Apps',
        		'slug'	=> 'build-apps'
        	],
        	[
        		'title'	=> 'News',
        		'slug'	=> 'news'
        	],
        	[
        		'title'	=> 'Freebies',
        		'slug'	=> 'freebies'
        	],
        	[
        		'title'	=> 'Events',
        		'slug'	=> 'events'
        	]
        ]);

        // update the posts data
        $categories = Category::pluck('id');

        foreach (Post::pluck('id') as $postId)
        {
            $categoryId = $categories[rand(0, $categories->count()-1)];

            DB::table('posts')
                    ->where('id', $postId)
                    ->update(['category_id' => $categoryId]);
        }


        // old code
        /*
        for ($post_id = 1; $post_id <= 36; $post_id++)
        {
        	$category_id = rand(1, 6);

        	DB::table('posts')
        			->where('id', $post_id)
        			->update(['category_id' => $category_id]);
        }
        */
    }
}
