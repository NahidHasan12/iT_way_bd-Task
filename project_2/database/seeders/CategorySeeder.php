<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Apple',
            'time' => '12:30:00'
        ]);

        Category::create([
            'name' => 'Samsung',
            'time' => '11:30:00'
        ]);
    }
}
