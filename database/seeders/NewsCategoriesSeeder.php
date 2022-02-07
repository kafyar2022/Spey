<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsCategories = array(
            array(
                'id' => 1,
                'en_title' => 'Interesting',
                'ru_title' => 'Интересное',
            ),
            array(
                'id' => 2,
                'en_title' => 'Pharmaceutical',
                'ru_title' => 'Фармацевтика',
            ),
            array(
                'id' => 3,
                'en_title' => 'Medicine',
                'ru_title' => 'Медицина',
            ),
            array(
                'id' => 4,
                'en_title' => 'Vaccine',
                'ru_title' => 'Вакцина',
            ),
        );

        foreach ($newsCategories as $category) {
            $newsCategory = new NewsCategory;
            $newsCategory->en_title = $category['en_title'];
            $newsCategory->ru_title = $category['ru_title'];
            $newsCategory->view_rate = Faker::create()->numberBetween($min = 10, $max = 30);
            $newsCategory->save();
        }
    }
}
