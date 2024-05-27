<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'roles' => 1,
        //     'status' => '0',
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Nguyễn Tiến Độ',
        //     'email' => 'do@gmail.com',
        //     'password' => Hash::make('123456'),
        //     'roles' => 0,
        //     'status' => '0',
        // ]);

        DB::table('users')->insert([
            'name' => 'Lê Văn Duẩn',
            'email' => 'duanlv@gmail.com',
            'password' => Hash::make('123456'),
            'roles' => 0,
            'status' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'Võ Nguyên Giáp',
            'email' => 'giapvn@gmail.com',
            'password' => Hash::make('123456'),
            'roles' => 0,
            'status' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Xuân Trường',
            'email' => 'truongtx@gmail.com',
            'password' => Hash::make('123456'),
            'roles' => 0,
            'status' => '0',
        ]);
    }
}
