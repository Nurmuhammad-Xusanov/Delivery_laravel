<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'nismoxn@gmail.com',
            'number' => '+998881211600',
            'password' => Hash::make('672331222'),
        ]);
        $adminUser->assignRole('admin');
    }
}
