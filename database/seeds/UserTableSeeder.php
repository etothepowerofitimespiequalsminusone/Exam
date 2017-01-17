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
            'role' => 1)
            );
        User::create(array(
                'name' => 'Mārtiņš',
                'email' => 'mlaganovskis@gmail.com',
                'password' => bcrypt('junkjard'),
                'role' => 0)
        );
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