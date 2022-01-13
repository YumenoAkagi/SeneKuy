<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'Admin',
            'lastname' => 'Admin', 
            'phoneNumber' => '0000000000',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'role_id' => '1'
        ]);
        // \App\Models\User::factory(10)->create();
        // $users = [];
        // $faker = Faker\Factory::create();

        // for($i = 0;$i < 15;$i++){
        //     $data[$i] = [

        //     ];
        // }
    }
}
