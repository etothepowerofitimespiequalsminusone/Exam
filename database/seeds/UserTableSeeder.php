<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(array(
            'name' => 'Admin',
            'email' => 'admin@musictracker.com',
            'password' => bcrypt('musictracker'),
            'role' => 1));
    }

//        public function run()
//        {
//            DB::table('users')->insert([
//                'name' => 'Admin',
//                'email' => 'admin@musictracker.com',
//                'password' => bcrypt('musictracker'),
//                'role' => 1,
//            ]);
//        }
}