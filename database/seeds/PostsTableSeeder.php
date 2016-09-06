<?php

use Illuminate\Database\Seeder;
use App\Article;
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
            $post = new Article;
            $post->title = $faker->catchPhrase;
            $post->short_description = $faker->text;
            $post->content = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $post->user_id = User::where('username', 'admin')->first()->id;
            $post->represent_image_id = create_file_from_path('http://www.fillmurray.com/640/480');
            $post->published_at = $faker->numberBetween(Article::STT_DRAFT, Article::STT_PUBLISHED);

            $post->save();
        }

        for ($i = 0; $i < $limit; $i++) {
            $product = new Product;
            $product->title = $faker->catchPhrase;
            $product->short_description = $faker->text;
            $product->content = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $product->user_id = User::where('username', 'admin')->first()->id;
            $product->represent_image_id = create_file_from_path('http://www.fillmurray.com/366/275');
            $product->price = $faker->randomDigitNotNull * 10000;
            $product->discount_price = $product->price * (100 - $faker->numberBetween(10, 15)) / 100;

            $product->save();
        }
    }
}
