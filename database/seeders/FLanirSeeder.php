<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlanirSeeder extends Seeder
{
    public function run(): void
    {
        // USERS
        DB::table('users')->insert([
            [
                'name' => 'Arif Admin',
                'email' => 'admin@flanir.com',
                'password' => bcrypt('123456'),
                'phone' => '081111111111',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr Agus',
                'email' => 'dokter@flanir.com',
                'password' => bcrypt('123456'),
                'phone' => '082222222222',
                'role' => 'dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sinta',
                'email' => 'resepsionis@flanir.com',
                'password' => bcrypt('123456'),
                'phone' => '083333333333',
                'role' => 'resepsionis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sarah Putri',
                'email' => 'client@flanir.com',
                'password' => bcrypt('123456'),
                'phone' => '084444444444',
                'role' => 'client',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // PRODUK
        DB::table('produks')->insert([
            [
                'nama_produk' => 'Vitamin Kucing',
                'harga' => 50000,
                'deskripsi' => 'Vitamin kesehatan bulu dan imun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Obat Anti Kutu',
                'harga' => 75000,
                'deskripsi' => 'Obat anti kutu untuk anjing dan kucing',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // ARTIKEL
        DB::table('artikels')->insert([
            [
                'judul' => 'Cara Merawat Kucing',
                'konten' => 'Tips menjaga kesehatan dan kebersihan kucing.',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pentingnya Vaksin Hewan',
                'konten' => 'Vaksin membantu menjaga kesehatan hewan.',
                'status' => 'Published',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // TRANSAKSI
        DB::table('transaksis')->insert([
            [
                'invoice_id' => 'INV001',
                'nama_pemilik' => 'Sarah Putri',
                'total_dana' => 150000,
                'status' => 'Verified',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // RESEP
        DB::table('reseps')->insert([
            [
                'nama_hewan' => 'Milo',
                'nama_obat' => 'Antibiotik',
                'dosis' => '2x sehari',
                'dokter_pemberi' => 'Dr Agus',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}