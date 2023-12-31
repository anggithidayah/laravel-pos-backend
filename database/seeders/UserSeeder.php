<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Anggit Hidayah',
            'email' => 'anggithidayah@xclude.id',
            'email_verified_at' => now(),
            'password' => Hash::make('658809bunda'),
            'phone' =>'081226005137',
            'roles'=>'ADMIN',
            'remember_token' => Str::random(10),
         ]);
         \App\Models\User::factory(5)->create();
    }
}
