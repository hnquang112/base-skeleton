<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Product;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            $post = new Post;
            $post->title = $faker->catchPhrase;
            $post->short_description = $faker->text;
            $post->content = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $post->author_id = User::where('username', 'admin')->first()->id;
            $post->represent_image_id = create_file_from_path($faker->imageUrl(640, 480, 'cats'));
            $post->published_at = $faker->numberBetween(Post::STT_DRAFT, Post::STT_PUBLISHED);

            $post->save();
        }

        for ($i = 0; $i < $limit; $i++) {
            $product = new Product;
            $product->title = $faker->catchPhrase;
            $product->short_description = $faker->text;
            $product->content = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $product->author_id = User::where('username', 'admin')->first()->id;
            $product->represent_image_id = create_file_from_path($faker->imageUrl(366, 275, 'cats'));
            $product->price = $faker->randomDigitNotNull * 10000;
            $product->discount_price = $product->price * (100 - $faker->numberBetween(10, 15)) / 100;

            $product->save();
        }
    }
}
