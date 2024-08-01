<?php

namespace Database\Seeders;

use App\Models\Catalogue;
use App\Models\Order;
use App\Models\SettingWeb;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nama' => 'admin'
        ]);

        Catalogue::factory()->create([
            'nama_produk' => 'Paket 1',
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At quae adipisci expedita atque sit libero a? Totam nulla illo quidem?',
            'harga' => '15000000',
            'image' => 'y98DQ8SzEHTsT70WHzizvnTJHTHEs0S9ftJ96QiP.jpg',
        ]);

        SettingWeb::factory()->create([
            'id' => 1,
            'contact' => '081243124312',
            'email' => 'weddingjwporganizer@gmail.com',
            'instagram' => 'weddingjwporganizer',
        ]);
    }
}
