<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            'nama'          => 'Citra Indah Bunga Ramadhan',
            'username'      => 'citra',
            'nip'           => '20021312.23.2.233',
            'jabatan'       => 'Karyawan',
            'unit'          => 'perawat',
            'alamat'        => 'Jl. Bhayangkara No.55, Tipes, Kec. Serengan, Kota Surakarta, Jawa Tengah 57154',
            'email'         => $faker->unique()->safeEmail,
            'password'      => Hash::make('admin'),
            'created_at'     => now(),
            'updated_at'    => now(),
        ]);

        DB::table('users')->insert([
            'nama'          => 'M. Sholeh',
            'username'      => 'sholeh',
            'nip'           => '19991213.1.2.1',
            'jabatan'       => 'Kepala Ruangan',
            'nama_ruang'    => 'perawat',
            'unit'          => 'perawat',
            'alamat'        => 'Jl. Merdeka No.88, Buaya, Kec. Babadan, Kota Apalah, Jawa Tengah 57154',
            'email'         => $faker->unique()->safeEmail,
            'password'      => Hash::make('admin'),
            'created_at'     => now(),
            'updated_at'    => now(),
        ]);

        DB::table('users')->insert([
            'nama'          => 'Afuw Cahya Putra',
            'username'      => 'Afuw',
            'nip'           => '20000101.10.20.111',
            'jabatan'       => 'Kepala Unit',
            'nama_ruang'    => 'perawat',
            'unit'          => 'perawat',
            'alamat'        => 'Jl. Perjuangan No.10, langsung Jawa, Kec. Balie, Kota Socokangsi, Jawa Tengah 57154',
            'email'         => $faker->unique()->safeEmail,
            'password'      => Hash::make('admin'),
            'created_at'     => now(),
            'updated_at'    => now(),
        ]);

        DB::table('users')->insert([
            'nama'          => 'Budi Arman',
            'username'      => 'budi',
            'nip'           => '19880110.10.20.122',
            'jabatan'       => 'Kepala SDM',
            'nama_ruang'    => 'sdm',
            'unit'          => 'sdm',
            'alamat'        => 'Jl. Perjuangan No.10, langsung Jawa, Kec. Balie, Kota Socokangsi, Jawa Tengah 57154',
            'email'         => $faker->unique()->safeEmail,
            'password'      => Hash::make('admin'),
            'created_at'     => now(),
            'updated_at'    => now(),
        ]);

        DB::table('users')->insert([
            'nama'          => 'Nuh Bambang',
            'username'      => 'nuh',
            'nip'           => '19750101.1.12.32',
            'jabatan'       => 'Direktur',
            'nama_ruang'    => 'direktur',
            'unit'          => 'direktur',
            'alamat'        => 'Jl. Perjuangan No.10, langsung Jawa, Kec. Balie, Kota Socokangsi, Jawa Tengah 57154',
            'email'         => $faker->unique()->safeEmail,
            'password'      => Hash::make('admin'),
            'created_at'     => now(),
            'updated_at'    => now(),
        ]);
    }
}
