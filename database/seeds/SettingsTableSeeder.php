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
        // Set default language of front page is Vietnamese
        Setting::updateOrCreate(['meta->label' => 'front_page_language'], [
            'label' => 'front_page_language',
            'type' => Setting::TYP_CONFIG,
            'config_value' => 'vi'
        ]);

        // Set default language of cms page is English
        Setting::updateOrCreate(['meta->label' => 'cms_page_language'], [
            'label' => 'cms_page_language',
            'type' => Setting::TYP_CONFIG,
            'config_value' => 'en'
        ]);

        // Seed the slider and quotes
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            $slider = new Setting;
            $slider->type = Setting::TYP_SLIDER;
            $slider->image_id = create_file_from_path($faker->imageUrl(960, 416, 'cats'));
            $slider->label = $faker->catchPhrase;

            $slider->save();
        }
    }
}
