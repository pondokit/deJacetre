<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->truncate();

        DB::table('about')->insert([
        	[
        		'about' => Factory::create()->paragraphs(rand(10, 15), true),
        	]
        ]);
    }
}
