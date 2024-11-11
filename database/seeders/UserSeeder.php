<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'administrator',
                'email' => 'admin',
                'level' => 'admin',
                'password' => hash::make('admin')
            ],
            [
                'username' => 'user',
                'name' => 'user',
                'email' => 'udrt',
                'level' => 'user',
                'password' => hash::make('123')
            ],
            [
                'username' => 'user1',
                'name' => 'user1',
                'email' => 'user1@mail.com',
                'level' => 'user1',
                'password' => hash::make('123')
            ],
        ];

        foreach ($user as $key => $value) {
            user::create($value);
        }
    }
}
