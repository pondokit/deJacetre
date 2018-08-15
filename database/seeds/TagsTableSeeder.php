<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        DB::table('post_tag')->truncate();

        $php = new Tag();
        $php->name = "PHP";
        $php->slug = "php";
        $php->save();

        $laravel = new Tag();
        $laravel->name = "Laravel";
        $laravel->slug = "laravel";
        $laravel->save();

        $symphony = new Tag();
        $symphony->name = "Symphony";
        $symphony->slug = "symphony";
        $symphony->save();

        $vue = new Tag();
        $vue->name = "Vue JS";
        $vue->slug = "vuejs";
        $vue->save();

        $trend = new Tag();
        $trend->name = "Trend";
        $trend->slug = "trend";
        $trend->save();

        $important = new Tag();
        $important->name = "Important";
        $important->slug = "important";
        $important->save();

        $overrated = new Tag();
        $overrated->name = "Overrated";
        $overrated->slug = "overrated";
        $overrated->save();

        $underrated = new Tag();
        $underrated->name = "Underrated";
        $underrated->slug = "underrated";
        $underrated->save();

        $best = new Tag();
        $best->name = "Best";
        $best->slug = "best";
        $best->save();

        $friend = new Tag();
        $friend->name = "Friend";
        $friend->slug = "friend";
        $friend->save();

        $tags = [
            $php->id,
            $laravel->id,
            $symphony->id,
            $vue->id,
            $trend->id,
            $important->id,
            $overrated->id,
            $underrated->id,
            $best->id,
            $friend->id,
        ];

        foreach (Post::all() as $post) 
        {
            shuffle($tags);

            for ($i=0; $i <= rand(0, 2); $i++) 
            { 
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);
            }
        }
    }
}
