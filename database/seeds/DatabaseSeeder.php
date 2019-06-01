<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

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
        DB::table('tentangs')->insert([
            'headline' => 'Kami Bekerja!',
            'deskripsi' => 'Kami siap bekerja demi anda!'
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
        DB::table('kontaks')->insert([
            'nama' => 'Email',
            'keterangan' => 'umkmovement@gmail.com',
        ]);
        DB::table('kontaks')->insert([
            'nama' => 'Phone',
            'keterangan' => '+62 81-556-778-776',
        ]);
        DB::table('kontaks')->insert([
            'nama' => 'Mobile',
            'keterangan' => '+62 81-554-556-537',
        ]);
        DB::table('kontaks')->insert([
            'nama' => 'Instagram',
            'keterangan' => '@umkmovement',
        ]);

        $faker = Faker::create('id_ID');
        for ($x = 1; $x <= 50; $x++) {

            // insert data dummy pegawai dengan faker
            DB::table('pesanmasuks')->insert([
                'nama' => $faker->name,
                'email' => preg_replace('/@example\..*/', '@domain.com', $faker->unique()->safeEmail),
                'nomer_tlep' => $faker->phoneNumber,
                'pesan' => $faker->realText($maxNbChars = 200, $indexSize = 1),
            ]);
        }
        // $this->call(UsersTableSeeder::class);
    }
}
