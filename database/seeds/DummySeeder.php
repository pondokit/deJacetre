<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	
    	$faker = Factory::create();
  		$posts = [];
        $date = Carbon::create(2018,5,10,9);

        DB::table('users')->insert([
  			[
  				'id'		=> 6,
  				'name' 		=> 'Dummy',
  				'email' 	=> 'dummy@test.com',
          		'slug' 		=> 'dummy',
  				'password' 	=> bcrypt('secret'),
          		'bio' 		=> $faker->text(rand(250, 300))
  			],
  		]);

    	for ($i = 1; $i <= 2; $i++)
    	{
    		$image = "dummy".$i.".jpg";
    		$date->addDays(1);
            $publishedDate = clone($date);
            $createdDate = clone($date);

    		$posts[] = [
    			'author_id'      => 6,
    			'title'          => $faker->sentence(rand(8, 12)),
    			'excerpt'        => $faker->text(rand(250, 300)),
    			'body'           => $faker->paragraphs(rand(10, 15), true),
    			'slug'           => $faker->slug(),
    			'image'          => $image,
    			'created_at'     => $createdDate,
    			'updated_at'     => $createdDate,
                'published_at'   => $i < 5 ? $publishedDate : ( rand(1, 0) == 0 ? NULL : $publishedDate->addDays(4) ),
                'view_count'     => rand(1, 10) * 10,
    		];
    	}

    	DB::table('posts')->insert($posts);
    }
}
