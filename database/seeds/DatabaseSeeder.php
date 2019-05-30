<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin UMKMovement',
            'username' => 'adminumkmovem',
            'email' => 'umkmovement@gmail.com',
            'password' => Hash::make('adminumkm456//'),
        ]);

        DB::table('jamkerjas')->insert([
            'hari' => 'Minggu',
        ]);
        DB::table('jamkerjas')->insert([
            'hari' => 'Senin',
        ]);
        DB::table('jamkerjas')->insert([
            'hari' => 'Selasa',
        ]);
        DB::table('jamkerjas')->insert([
            'hari' => 'Rabu',
        ]);
        DB::table('jamkerjas')->insert([
            'hari' => 'Kamis',
        ]);
        DB::table('jamkerjas')->insert([
            'hari' => "Jum'at",
        ]);
        DB::table('jamkerjas')->insert([
            'hari' => 'Sabtu',
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
