<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // reset the users table
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
  		DB::table('users')->truncate();

      $faker = Factory::create();

  		// generate 3 user/author
  		DB::table('users')->insert([
  			[
  				'name' => 'John Doe',
  				'email' => 'johndoe@test.com',
          'slug' => 'john-doe',
  				'password' => bcrypt('secret'),
          'bio' => $faker->text(rand(250, 300))
  			],
  			[
  				'name' => 'Jane Doe',
  				'email' => 'janedoe@test.com',
          'slug' => 'jane-doe',
  				'password' => bcrypt('secret'),
          'bio' => $faker->text(rand(250, 300))
  			],
        [
          'name' => 'Edo Masaru',
          'email' => 'edo@test.com',
          'slug' => 'edo-masaru',
          'password' => bcrypt('secret'),
          'bio' => $faker->text(rand(250, 300))
        ],
        [
          'name' => 'Rambo',
          'email' => 'rambo@test.com',
          'slug' => 'rambo',
          'password' => bcrypt('secret'),
          'bio' => $faker->text(rand(250, 300))
        ],
        [
          'name' => 'Michael',
          'email' => 'michael@test.com',
          'slug' => 'michael',
          'password' => bcrypt('secret'),
          'bio' => $faker->text(rand(250, 300))
        ],
  		]);
    }
}
