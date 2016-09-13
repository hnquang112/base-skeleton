<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the slider and quotes
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            $slider = new Setting;
            $slider->type = Setting::TYP_SLIDER;
            $slider->image_id = create_file_from_path('http://www.fillmurray.com/960/416');
            $slider->label = $faker->catchPhrase;

            $slider->save();
        }
    }
}
