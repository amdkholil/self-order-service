<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menusJson = '[
            {
                "name": "Indomie telor",
                "price": "15000"
            },
            {
                "name": "Bakso",
                "price": "25000"
            },
            {
                "name": "Mie Ayam",
                "price": "27000"
            },
            {
                "name": "Mie Goreng",
                "price": "20000"
            },
            {
                "name": "Soto Ayam",
                "price": "25000"
            },
            {
                "name": "Sop Iga",
                "price": "30000"
            }
        ]';

        $menu = json_decode($menusJson);

        foreach ($menu as $m) {
            Menu::factory()
            ->create([
                'category_id' => 1,
                'name' => $m->name,
                'price' => $m->price,
                'image' => strtolower(str_replace(' ', '-', $m->name)) . '.avif'
            ]);
        }
    }
}
