<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Todo, Category};

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        Todo::factory()
            ->count(3)
            ->create();

        foreach($categories as $category) {
            Todo::factory()
            ->count(3)
            ->for($category)
            ->create();
        };
    }
}
