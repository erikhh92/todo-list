<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Shopping',
                'icon' => 'cart-shopping',
                'color' => '#099CEA'
            ],
            [
                'title' => 'Lifestyle',
                'icon' => 'person-running',
                'color' => '#09EA73'
            ],
            [
                'title' => 'Travel',
                'icon' => 'plane-departure',
                'color' => '#DA31F1'
            ],
            [
                'title' => 'Meet',
                'icon' => 'handshake',
                'color' => '#E9F131'
            ],
            [
                'title' => 'Health',
                'icon' => 'user-doctor',
                'color' => '#F18931'
            ]
        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}
