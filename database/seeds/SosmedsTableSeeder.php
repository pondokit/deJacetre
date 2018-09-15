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
        		'facebook'	=> 'www.facebook.com',
        		'instagram'	=> 'www.instagram.com',
        		'github'	=> 'www.github.com',
        		'twitter'	=> 'www.twitter.com',
        		'youtube'	=> 'www.youtube.com',
        	],
        ]);
    }
}
