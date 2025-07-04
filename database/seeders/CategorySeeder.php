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
        $categories = ['Chicken', 'Coffee', 'hamburger', 'hotdog', 'pizza', 'soup','tea'];

        foreach ($categories as $c) {
            Category::factory()
                ->create([
                    'name' => $c,
                    'image' => 'storage/category/'.strtolower(str_replace(' ','-', $c)) . '.png'
                ]);
        }
    }
}
