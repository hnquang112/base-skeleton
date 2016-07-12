<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminCounter = User::whereType(User::MASTER)->count();

        if ($adminCounter < 1) {
            $admin = new User;
            $admin->email = 'hnquang112@yahoo.com.vn';
            $admin->username = 'super_admin';
            $admin->password = 'zxcv1234';
            $admin->type = User::MASTER;
            $admin->display_name = 'Master Q!';
            $admin->save();
        }
    }
}
