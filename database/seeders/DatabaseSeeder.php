<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Festival',
                'email' => 'admin@layangan.test',
                'role' => 'admin',
                'is_approved' => true,
            ],
            [
                'name' => 'Juri Festival',
                'email' => 'juri@layangan.test',
                'role' => 'juri',
                'is_approved' => true,
            ],
            [
                'name' => 'Peserta Festival',
                'email' => 'peserta@layangan.test',
                'role' => 'peserta',
                'is_approved' => true,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make('password'),
                    'role' => $user['role'],
                    'is_approved' => $user['is_approved'],
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
