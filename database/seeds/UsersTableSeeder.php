<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Setting;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $saCounter = User::whereType(User::MASTER)->count();

        // Restrict only 1 super admin
        if ($saCounter < 1) {
            $sa = new User;
            $sa->email = 'hnquang112@yahoo.com.vn';
            $sa->username = 'super_admin';
            $sa->password = 'zxcv1234';
            $sa->type = User::MASTER;
            $sa->display_name = 'Master Q!';
            $sa->save();
        }

        $admin = new User;

        $admin->email = 'admin@gmail.com';
        $admin->username = 'admin';
        $admin->password = 'admin';
        $admin->type = User::ADMIN;
        $admin->display_name = 'Admin';
        $admin->save();

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
    }
}
