<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected array $categories = [
        'Backend Developer',
        'Front end Developer',
        'Mobile Developer',
        'Techlead',
        'UX / UI Design',
        'Software Architecture',
        'Devops',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create(['category' => $category]);
        }
    }
}
