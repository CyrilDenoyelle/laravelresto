<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                    'name' => 'Cyril Denoyelle',
                    'email' => 'cyril-denoyelle@hotmail.fr',
                    'password' => bcrypt('qwerty'),
                    'confirmed' => 1,
                ]);
    }
}
