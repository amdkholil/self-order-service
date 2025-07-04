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
                "category": "6",
                "price": "15000"
            },
            {
                "name": "Bakso",
                "category": "6",
                "price": "25000"
            },
            {
                "name": "Mie Ayam",
                "category": "1",
                "price": "27000"
            },
            {
                "name": "Mie Goreng",
                "category": "1",
                "price": "20000"
            },
            {
                "name": "Soto Ayam",
                "category": "6",
                "price": "25000"
            },
            {
                "name": "Sop Iga",
                "category": "6",
                "price": "30000"
            },
            {
                "name": "Burger",
                "category": "3",
                "price": "15000"
            },
            {
                "name": "Es Teh",
                "category": "7",
                "price": "5000"
            },
            {
                "name": "Espresso",
                "category": "2",
                "price": "17000"
            }
        ]';

        $menu = json_decode($menusJson);

        foreach ($menu as $m) {
            Menu::factory()
            ->create([
                'category_id' => $m->category,
                'name' => $m->name,
                'price' => $m->price,
                'image' => 'storage/menu/'.strtolower(str_replace(' ', '-', $m->name)) . '.avif'
            ]);
        }
    }
}
