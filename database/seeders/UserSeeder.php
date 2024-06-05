<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testAvatarsPaths = [
            'avatars/user_test_1.png',
            'avatars/user_test_2.png',
            'avatars/user_test_3.png',
            'avatars/user_test_4.png',
            'avatars/user_test_5.png',
        ];

        for ($i=0; $i < 500; $i++) {
            DB::table('users')->insert([
                'created_at' => now(),
                'updated_at' => now(),

                'name' => fake()->firstName(),
                'email' => fake()->email(),
                'avatar' => fake()->randomElement($testAvatarsPaths),
                'bio' => fake()->text(),

                'password' => Hash::make('password'),
            ]);
        }
    }
}
