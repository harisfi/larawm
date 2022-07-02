<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory([
            'name' => 'Admin',
            'email' => 'admin@mail.com'
        ])->create();

        $this->call([
            ProductSeeder::class,
            WarehouseSeeder::class
        ]);
    }
}
