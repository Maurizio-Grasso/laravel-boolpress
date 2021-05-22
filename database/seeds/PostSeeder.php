<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            $new_post = new Post();
            $new_post->title   = $faker->sentence(rand(2,4));
            $new_post->content = $faker->text(rand(300,800));

            $slug = Str::slug($new_post->title , '-');
            $new_post->slug = $slug;  
            $slub_base = $slug;

            $post_presente = Post::where('slug' , $slug)->first();

            $contatore = 1;

            while($post_presente) {
                $slug = $slub_base . '-' . $contatore;
                $contatore++;
            }

            $new_post->slug = $slug;
            $new_post->user_id = 1;
            // $new_post->category_id = 1;

            $new_post->save();
        }
    }
}
