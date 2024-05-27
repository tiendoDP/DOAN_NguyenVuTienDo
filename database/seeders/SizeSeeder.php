<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            'S',
            'M',
            'L',
            'XL',
            'XXL',
        ];

        // Lặp qua mỗi màu và thêm vào bảng colors
        foreach ($sizes as $size) {
            DB::table('sizes')->insert([
                'name' => $size,
            ]);
        }
    }
}
