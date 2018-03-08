<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'technology',
            'social',
            'religion',
            'spiritual',
            'country',
            'music',
            'movies',
            'politics',
            'opinion',
            'health',
        ];

        foreach ($data as $value) {
            $category = new App\Category;
            $category->name = $value;
            $category->save();
        }
    }
}
