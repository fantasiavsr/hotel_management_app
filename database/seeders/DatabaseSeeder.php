<?php

namespace Database\Seeders;

use App\Models\booking;
use App\Models\hotels;
use App\Models\pelanggan;
use App\Models\User;
use App\Models\ruangan;
use App\Models\transaksi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /* create user with random name, email, password = matahariku, type = admin, nohp =n ull, image = null*/
        User::create([
            'name' => 'Muhamad Alif Rizki',
            'email' => 'fantasiavsr@gmail.com',
            'type' => 'admin',
            'password' => bcrypt('matahariku'),
            'nohp' => '081234567890',
            'image' => null,
        ]);

        User::create([
            'name' => 'Test User 1',
            'email' => 'test1@gmail.com',
            'type' => 'admin',
            'password' => bcrypt('matahariku'),
            'nohp' => '081234567890',
            'image' => null,
        ]);

        User::create([
            'name' => 'Test User 2',
            'email' => 'test2@gmail.com',
            'type' => 'admin',
            'password' => bcrypt('matahariku'),
            'nohp' => '081234567890',
            'image' => null,
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 101',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 102',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 103',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 104',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 105',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 106',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 107',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 108',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 109',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 1,
            'name' => 'Kamar 110',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 2,
            'name' => 'Kamar 111',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        ruangan::create([
            'user_id' => 2,
            'name' => 'Kamar 112',
            'type' => 'Kamar Besar Lt.2',
            'price' => 800000,
            'bed' => 2,
            'bathroom' => 1,
            'size' => '3x3',
            'desc' => 'Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang menawarkan pemandangan taman yang indah, dan fasilitas modern seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan merasa seperti di rumah.',
            'utilsRespons' => 'yes',
            'pets' => 'yes',
            'propsDetails' => 'Must have 3x the rent in total household income (before taxes)',
            'image' => 'room-7.jpeg',
        ]);

        hotels::create([
            'user_id' => 1,
            'name' => 'hotel saya',
            'address' => 'menur 4',
            'image' => null,
            'desc' => 'ini test',
        ]);

        pelanggan::create([
            'user_id' => 1,
            'customer_id' => null,
            'name' => 'pelanggan saya',
            'nohp' => '081234567890',
            'nik' => '1234567890',
            'address' => 'menur 4',
            'status' => 'active',
        ]);

        booking::create([
            'user_id' => 1,
            'visitor_id' => 1,
            'hotel_id' => 1,
            'room_id' => 1,
            'visitor_name' => 'pelanggan saya',
            'visitor_nohp' => '081234567890',
            'total_visitor' => 2,
            'checkin' => '2021-10-12',
            'checkout' => '2021-10-13',
            'status' => 'pending',
            'price' => 800000,
            'note' => 'ini test',
        ]);

        transaksi::create([
            'user_id' => 1,
            'booking_id' => 1,
            'visitor_name' => 'pelanggan saya',
            'visitor_nohp' => '081234567890',
            'payment' => 'BCA',
            'price' => 800000,
            'status' => 'pending',
        ]);
    }
}
