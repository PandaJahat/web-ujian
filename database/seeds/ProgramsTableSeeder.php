<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            [
                'faculty_id' => 1,
                'name' => 'Sistem Informasi',         
                'created_at' => now()
            ],
            [
                'faculty_id' => 1,
                'name' => 'Teknik Informatika',         
                'created_at' => now()
            ],
            [
                'faculty_id' => 1,
                'name' => 'Teknik Telekomunikasi',         
                'created_at' => now()
            ],
            [
                'faculty_id' => 2,
                'name' => 'Manajemen',         
                'created_at' => now()
            ],
            [
                'faculty_id' => 2,
                'name' => 'Akuntansi',         
                'created_at' => now()
            ],
            [
                'faculty_id' => 2,
                'name' => 'Perpajakan',         
                'created_at' => now()
            ],
            [
                'faculty_id' => 3,
                'name' => 'Sastra Inggris',         
                'created_at' => now()
            ],
            [
                'faculty_id' => 4,
                'name' => 'Psikologi',         
                'created_at' => now()
            ]
        ];

        DB::table('programs')->insert($programs);
    }
}
