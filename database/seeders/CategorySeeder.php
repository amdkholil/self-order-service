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
        $categories = ['Chicken', 'Soup', 'Coffee', 'Tea', 'Hamburger'];

        foreach ($categories as $c) {
            Category::factory()
                ->create([
                    'name' => $c,
                    'image' => strtolower(str_replace(' ','-', $c)) . '.png'
                ]);
        }
    }
}
