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
        $users = [
            [
                'name' => 'Автор невідомий',
                'email' => 'unknown-autor@g.g',
                'password' => bcrypt(str_random(16)),
            ],
            [
                'name' => 'Автор',
                'email' => 'author@g.g',
                'password' => bcrypt('123123'),
            ]
        ];

        \DB::table('users')->insert($users);
    }
}
