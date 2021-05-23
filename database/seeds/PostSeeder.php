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

        $posts = config('posts');

        foreach ($posts as $post) {

            $new_post = new Post();
            $new_post->title   = $post['title'];
            $new_post->featured_img   = $post['featured_img'];
            $new_post->content   = $post['content'];
            $new_post->category_id  = $post['category_id'];

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

            // $new_post->category_id = rand(1,2);
            
            $new_post->save();
        }
    }
}