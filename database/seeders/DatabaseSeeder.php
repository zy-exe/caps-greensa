<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Train;
use App\Models\CartItem;
use App\Models\TrainFacility;
use App\Models\LayoutModels;
use App\Models\TrainImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create admin
        Admin::create([
            'username' => 'admin@mail.com',
            'password' => bcrypt("adminpass")
        ]);

        // create guest
        Guest::create([
            'name' => 'guest',
            'nik' => '123',
            'telp' => '123',
            'alamat' => 'sby',
            'kota' => 'sby',
            'provinsi' => 'sby',
            'negara' => 'sby',
            'username' => 'guest@gmail.com',
            'email' => 'guest@gmail.com',
            'password' => bcrypt("guestpass"),
            'is_activated' => true,
        ]);

        // create train
        Train::create([
            'nama' => 'Ruang 101',
            'lantai' => 1,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 102',
            'lantai' => 1,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 103',
            'lantai' => 1,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 104',
            'lantai' => 1,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 201',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 202',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 203',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 204',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 205',
            'lantai' => 2,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 206',
            'lantai' => 2,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 207',
            'lantai' => 2,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 208',
            'lantai' => 2,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 301',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 302',
            'lantai' => 3,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 303',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 304',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 305',
            'lantai' => 3,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 306',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 307',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 308',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 309',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 310',
            'lantai' => 3,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 401',
            'lantai' => 4,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 402',
            'lantai' => 4,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 403',
            'lantai' => 4,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 404',
            'lantai' => 4,
            'harga' => 1200000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 405',
            'lantai' => 4,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ruang 406',
            'lantai' => 4,
            'harga' => 2000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Ujian Terbuka',
            'lantai' => 4,
            'harga' => 3500000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Aljabar',
            'lantai' => 5,
            'harga' => 3000000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        Train::create([
            'nama' => 'Convention Hall',
            'lantai' => 5,
            'harga' => 8500000,
            'deskripsi' => 'deskripsi ruangan',
        ]);

        // create facility
        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'Air Conditioner'
        ]);

        // create layout
        LayoutModels::create([
            'train_id' => 1,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 1,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 1,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 2,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 2,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 2,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 3,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 3,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 3,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 4,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 4,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 4,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 5,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 5,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 5,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 6,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 6,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 6,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 7,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 7,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 7,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 8,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 8,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 8,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 9,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 9,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 9,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 10,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 10,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 10,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 11,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 11,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 11,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 12,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 12,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 12,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 13,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 13,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 13,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 14,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 14,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 14,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 15,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 15,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 15,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 16,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 16,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 16,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 17,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 17,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 17,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 18,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 18,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 18,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 19,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 19,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 19,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 20,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 20,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 20,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 21,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 21,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 21,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 22,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 22,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 22,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 23,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 23,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 23,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 24,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 24,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 24,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 25,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 25,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 25,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 26,
            'nama_layout' => 'Classroom',
            'kapasitas' => 15
        ]);
        LayoutModels::create([
            'train_id' => 26,
            'nama_layout' => 'Teater',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 26,
            'nama_layout' => 'Round Table',
            'kapasitas' => 10
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 27,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 27,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 27,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 28,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 28,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 28,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 29,
            'nama_layout' => 'Classroom',
            'kapasitas' => 60
        ]);
        LayoutModels::create([
            'train_id' => 29,
            'nama_layout' => 'Teater',
            'kapasitas' => 90
        ]);
        LayoutModels::create([
            'train_id' => 29,
            'nama_layout' => 'Round Table',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 29,
            'nama_layout' => 'U Shape',
            'kapasitas' => 30
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 30,
            'nama_layout' => 'Classroom',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 30,
            'nama_layout' => 'Teater',
            'kapasitas' => 60
        ]);
        LayoutModels::create([
            'train_id' => 30,
            'nama_layout' => 'Round Table',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 30,
            'nama_layout' => 'U Shape',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 31,
            'nama_layout' => 'Classroom',
            'kapasitas' => 130
        ]);
        LayoutModels::create([
            'train_id' => 31,
            'nama_layout' => 'Teater',
            'kapasitas' => 250
        ]);
        LayoutModels::create([
            'train_id' => 31,
            'nama_layout' => 'Round Table',
            'kapasitas' => 45
        ]);
        LayoutModels::create([
            'train_id' => 31,
            'nama_layout' => 'U Shape',
            'kapasitas' => 30
        ]);

        // create gambar
        // gambar train 01
        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'denah',
            'gambar'    => 'denah101.png',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 02
        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'denah',
            'gambar'    => 'denah102.png',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 03
        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'denah',
            'gambar'    => 'denah103.png',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 04
        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'denah',
            'gambar'    => 'denah104.png',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 05
        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'denah',
            'gambar'    => 'denah201.png',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 06
        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'denah',
            'gambar'    => 'denah202.png',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 07
        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'denah',
            'gambar'    => 'denah203.png',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 08
        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'denah',
            'gambar'    => 'denah204.png',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 09
        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'denah',
            'gambar'    => 'denah205.png',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 10
        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'denah',
            'gambar'    => 'denah206.png',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 11
        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'denah',
            'gambar'    => 'denah207.png',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 12
        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'denah',
            'gambar'    => 'denah208.png',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 13
        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'denah',
            'gambar'    => 'denah301.png',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 14
        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'denah',
            'gambar'    => 'denah302.png',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 15
        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'denah',
            'gambar'    => 'denah303.png',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 16
        TrainImage::create([
            'train_id'  => 16,
            'konten'    => 'denah',
            'gambar'    => 'denah304.png',
        ]);

        TrainImage::create([
            'train_id'  => 16,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 16,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 16,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 16,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 17
        TrainImage::create([
            'train_id'  => 17,
            'konten'    => 'denah',
            'gambar'    => 'denah305.png',
        ]);

        TrainImage::create([
            'train_id'  => 17,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 17,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 17,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 17,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 18
        TrainImage::create([
            'train_id'  => 18,
            'konten'    => 'denah',
            'gambar'    => 'denah306.png',
        ]);

        TrainImage::create([
            'train_id'  => 18,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 18,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 18,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 18,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 19
        TrainImage::create([
            'train_id'  => 19,
            'konten'    => 'denah',
            'gambar'    => 'denah307.png',
        ]);

        TrainImage::create([
            'train_id'  => 19,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 19,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 19,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 19,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 20
        TrainImage::create([
            'train_id'  => 20,
            'konten'    => 'denah',
            'gambar'    => 'denah308.png',
        ]);

        TrainImage::create([
            'train_id'  => 20,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 20,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 20,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 20,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 21
        TrainImage::create([
            'train_id'  => 21,
            'konten'    => 'denah',
            'gambar'    => 'denah309.png',
        ]);

        TrainImage::create([
            'train_id'  => 21,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 21,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 21,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 21,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 22
        TrainImage::create([
            'train_id'  => 22,
            'konten'    => 'denah',
            'gambar'    => 'denah310.png',
        ]);

        TrainImage::create([
            'train_id'  => 22,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 22,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 22,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 22,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 23
        TrainImage::create([
            'train_id'  => 23,
            'konten'    => 'denah',
            'gambar'    => 'denah401.png',
        ]);

        TrainImage::create([
            'train_id'  => 23,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 23,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 23,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 23,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 24
        TrainImage::create([
            'train_id'  => 24,
            'konten'    => 'denah',
            'gambar'    => 'denah402.png',
        ]);

        TrainImage::create([
            'train_id'  => 24,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 24,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 24,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 24,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 25
        TrainImage::create([
            'train_id'  => 25,
            'konten'    => 'denah',
            'gambar'    => 'denah403.png',
        ]);

        TrainImage::create([
            'train_id'  => 25,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 25,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 25,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 25,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 26
        TrainImage::create([
            'train_id'  => 26,
            'konten'    => 'denah',
            'gambar'    => 'denah404.png',
        ]);

        TrainImage::create([
            'train_id'  => 26,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 26,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 26,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 26,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 27
        TrainImage::create([
            'train_id'  => 27,
            'konten'    => 'denah',
            'gambar'    => 'denah405.png',
        ]);

        TrainImage::create([
            'train_id'  => 27,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 27,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 27,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 27,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 28
        TrainImage::create([
            'train_id'  => 28,
            'konten'    => 'denah',
            'gambar'    => 'denah406.png',
        ]);

        TrainImage::create([
            'train_id'  => 28,
            'konten'    => 'utama',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 28,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 28,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ruang.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 28,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ruang.jpg',
        ]);

        // gambar train 29
        TrainImage::create([
            'train_id'  => 29,
            'konten'    => 'denah',
            'gambar'    => 'denahUjianTerbuka.png',
        ]);

        TrainImage::create([
            'train_id'  => 29,
            'konten'    => 'utama',
            'gambar'    => 'img_ujianterbuka.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 29,
            'konten'    => 'biasa1',
            'gambar'    => 'img_ujianterbuka.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 29,
            'konten'    => 'biasa2',
            'gambar'    => 'img_ujianterbuka.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 29,
            'konten'    => 'biasa3',
            'gambar'    => 'img_ujianterbuka.jpg',
        ]);

        // gambar train 30
        TrainImage::create([
            'train_id'  => 30,
            'konten'    => 'denah',
            'gambar'    => 'denahAljabar.png',
        ]);

        TrainImage::create([
            'train_id'  => 30,
            'konten'    => 'utama',
            'gambar'    => 'img_aljabar.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 30,
            'konten'    => 'biasa1',
            'gambar'    => 'img_aljabar.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 30,
            'konten'    => 'biasa2',
            'gambar'    => 'img_aljabar.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 30,
            'konten'    => 'biasa3',
            'gambar'    => 'img_aljabar.jpg',
        ]);

        // gambar train 31
        TrainImage::create([
            'train_id'  => 31,
            'konten'    => 'denah',
            'gambar'    => 'denahConventionHall.png',
        ]);

        TrainImage::create([
            'train_id'  => 31,
            'konten'    => 'utama',
            'gambar'    => 'img_hall.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 31,
            'konten'    => 'biasa1',
            'gambar'    => 'img_hall.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 31,
            'konten'    => 'biasa2',
            'gambar'    => 'img_hall.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 31,
            'konten'    => 'biasa3',
            'gambar'    => 'img_hall.jpg',
        ]);

        // create cart
        Cart::create([
            'guest_id' => 1,
        ]);

        Cart::create([
            'guest_id' => 2,
        ]);
    }
}
