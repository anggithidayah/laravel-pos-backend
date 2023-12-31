<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        \App\Models\User::factory()->create([
            'name' => 'Anggit Hidayah',
            'email' => 'anggithidayah@xclude.id',
            'email_verified_at' => now(),
            'password' => Hash::make('658809bunda'),
            'phone' =>'081226005137',
            'roles'=>'ADMIN',
            'remember_token' => Str::random(10),
         ]);

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
