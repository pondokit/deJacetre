<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// reset the posts table
    	DB::table('posts')->truncate();

    	// generate 36 dummy posts data
    	$posts = [];
    	$faker = Factory::create();
        $date = Carbon::now()->modify('-10 month');

    	for ($i = 1; $i <= 36; $i++)
    	{
    		$image = "Post_Image_".rand(1, 10).".jpg";
    		$date->addDays(10);
            $publishedDate = clone($date);
            $createdDate = clone($date);

    		$posts[] = [
    			'author_id'      => rand(1, 5),
    			'title'          => $faker->sentence(rand(2, 3)),
    			'excerpt'        => $faker->text(rand(250, 300)),
    			'body'           => $faker->paragraphs(rand(10, 15), true),
    			'slug'           => $faker->slug(),
    			'image'          => $image,
    			'created_at'     => $createdDate,
    			'updated_at'     => $createdDate,
                'published_at'   => $i < 30 ? $publishedDate : ( rand(1, 0) == 0 ? NULL : $publishedDate->addDays(4) ),
                'view_count'     => rand(1, 10) * 10,
    		];
    	}

    	DB::table('posts')->insert($posts);
    }
}
