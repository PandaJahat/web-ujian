<?php

use Illuminate\Database\Seeder;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            [
                'name' => 'Fakultas Teknik dan Informatika',         
                'created_at' => now()
            ],
            [
                'name' => 'Fakultas Ekonomi dan Bisnis',         
                'created_at' => now()
            ],
            [
                'name' => 'Fakultas Bahasa dan Budaya',         
                'created_at' => now()
            ],
            [
                'name' => 'Fakultas Psikologi',         
                'created_at' => now()
            ]
        ];

        DB::table('faculties')->insert($faculties);
    }
}
