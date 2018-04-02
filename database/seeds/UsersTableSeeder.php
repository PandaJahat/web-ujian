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
        $examples = [
          [
             'name' => 'Abdurrohim Saifi',
             'email' => 'demo@gmail.com',
             'username' => 'demo',
             'password' => bcrypt('demo'),
             'created_at' => now()
          ],
          [
            'name' => 'Arinta Saskya',
            'email' => 'arinta@gmail.com',
            'username' => 'arinta',
            'password' => bcrypt('arinta'),
            'created_at' => now()
          ]
        ];

        DB::table('users')->insert($examples);
    }
}
