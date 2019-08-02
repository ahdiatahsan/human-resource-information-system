<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Insert default record (users table)
        DB::table('users')->insert(
            [ 
                [
                'email' => 'superadmin@mail.com', 
                'password' => bcrypt('123123'), 
                'role' => 'superadmin', 
                'created_at' => now(), 
                'updated_at' => now()
                ],
            ]
        );

        // Insert default record (golongan table)
        DB::table('golongan')->insert(
            [ 
                [
                'nama_golongan' => 'Golongan I',
                'created_at' => now(), 
                'updated_at' => now()
                ],
            ]
        );

        // Insert default record (divisi table)
        DB::table('divisi')->insert(
            [ 
                [
                'nama_divisi' => 'Back End Developer',
                'created_at' => now(), 
                'updated_at' => now()
                ],
            ]
        );
    }
}
