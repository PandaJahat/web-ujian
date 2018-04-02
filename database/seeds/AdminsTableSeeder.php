<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
         'name' => 'Shinobu',
         'email' => 'admin@gmail.com',
         'job_title' => 'admin',
         'password' => bcrypt('admin'),         
         'created_at' => now()
     ]);
    }
}
