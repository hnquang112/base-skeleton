<?php

use Illuminate\Database\Seeder;
use App\User;

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
    }
}
