<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Web Design']);
        Category::create(['name' => 'Web Development']);
        Category::create(['name' => 'JS Framework']);
        Category::create(['name' => 'Laravel Framework']);
        Category::create(['name' => 'NodeJS']);
    }
}
