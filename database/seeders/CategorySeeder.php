<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories_arr = [
            [
                'parent_id' => null,
                'name' => 'Мъже',
                'slug' => Str::slug('мъже', '-', 'bg'),
                'children' => [ 
                    'Дрехи',
                    'Аксесоари',
                    'Университетски аксесоари',
                    'Техника'
                ]
            ],
            [
                'parent_id' => null,
                'name' => 'Жени',
                'slug' => Str::slug('Жени', '-', 'bg'),
                'children' => [
                    'Дрехи',
                    'Аксесоари',
                    'Козметика'
                ]

            ],
            [
                'parent_id' => null,
                'name' => 'Деца',
                'slug' => Str::slug('Деца', '-', 'bg'),
                'children' => [
                    'Дрехи',
                    'Играчки и игри',
                    'Училищни аксесоари',
                    'Книги'
                ]
            ]
        ];

        foreach ($categories_arr as $category_arr) {
            $category = Category::create([
                'parent_id' => $category_arr['parent_id'],
                'name' => $category_arr['name'],
                'slug' => $category_arr['slug']
            ]);

            if(isset($category_arr['children']))
            {
                foreach($category_arr['children'] as $subcategory)
                {
                    $subcategory = Category::create([
                        'parent_id' => $category->id,
                        'name' => $subcategory,
                        'slug' => Str::slug($subcategory, '-', 'bg')
                    ]);
                }
            }
            
        }
    }
}
