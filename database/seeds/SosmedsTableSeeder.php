<?php

use Illuminate\Database\Seeder;

class SosmedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sosmeds')->truncate();

        DB::table('sosmeds')->insert([
        	[
        		'id'		=> 1,
        		'facebook'	=> 'http://www.facebook.com',
        		'instagram'	=> 'http://www.instagram.com',
        		'github'	=> 'http://www.github.com',
        		'twitter'	=> 'http://www.twitter.com',
        		'youtube'	=> 'http://www.youtube.com',
        	],
        ]);
    }
}
