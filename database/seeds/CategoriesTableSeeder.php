<?php

use Illuminate\Database\Seeder;

/**
 * Class Categories table seeder.
 */
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $categoryName = 'Без категорії';
        $categories[] = [
            'title' => $categoryName,
            'slug' => str_slug($categoryName),
            'parent_id' => 0,
        ];

        for($i = 1; $i <= 10; $i++) {
            $categoryName = 'Категорія #'.$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'title' => $categoryName,
                'slug' => str_slug($categoryName),
                'parent_id' => $parentId
            ];
        }

        \DB::table('categories')->insert($categories);
    }
}
