<?php

use Illuminate\Database\Seeder;
use App\Post;

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
            $post = new Post([
                'title' => $faker->catchPhrase,
                'content' => $faker->paragraph,
                'author_id' => 2
            ]);

            $post->save();
        }
    }
}
