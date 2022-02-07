<?php

namespace Database\Seeders;

use App\Models\ProductsCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsCategories = array(
            array(
                'id' => 1,
                'en_title' => 'Allergy',
                'ru_title' => 'Аллергия',
                'icon' => null,
            ),
            array(
                'id' => 2,
                'en_title' => 'Antibiotics',
                'ru_title' => 'Антибиотики',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20.69" height="20" viewBox="0 0 20.69 20"><g transform="translate(-395 -1955)"><g transform="translate(395 1954)"><circle cx="0.5" cy="0.5" r="0.5" transform="translate(15.022 13.654)" fill="#fff"/><circle transform="translate(16.022 20.656)" fill="#fff"/><ellipse cx="0.5" rx="0.5" transform="translate(7.018 17.656)" fill="#fff"/><circle cx="0.5" cy="0.5" r="0.5" transform="translate(12.02 14.654)" fill="#fff"/><ellipse cy="0.5" ry="0.5" transform="translate(18.024 16.655)" fill="#fff"/><ellipse cx="0.5" rx="0.5" transform="translate(5.017 20.656)" fill="#fff"/><path d="M5.884,10.98A3.447,3.447,0,0,0,1.01,15.854l5.362,5.362,4.874-4.874Z" transform="translate(0 -5.875)" fill="#fff"/><path d="M37.609,2.01a3.447,3.447,0,0,0-4.874,0L27.373,7.371l4.874,4.874,5.362-5.362a3.446,3.446,0,0,0,0-4.874Z" transform="translate(-17.929)" fill="#fff"/><path d="M34.757,33.379a1.379,1.379,0,1,0-1.379,1.379A1.38,1.38,0,0,0,34.757,33.379Z" transform="translate(-20.965 -20.31)" fill="#fff"/><path d="M26.379,40a1.379,1.379,0,1,0,1.379,1.379A1.38,1.38,0,0,0,26.379,40Z" transform="translate(-16.379 -25.551)" fill="#fff"/><path d="M36.379,46a1.379,1.379,0,1,0,1.379,1.379A1.38,1.38,0,0,0,36.379,46Z" transform="translate(-22.93 -29.481)" fill="#fff"/><path d="M26.379,51a1.379,1.379,0,1,0,1.379,1.379A1.38,1.38,0,0,0,26.379,51Z" transform="translate(-16.379 -32.757)" fill="#fff"/></g></g></svg>',
            ),
            array(
                'id' => 3,
                'en_title' => 'Sore throat',
                'ru_title' => 'Боль в горле',
                'icon' => null,
            ),
            array(
                'id' => 4,
                'en_title' => 'Bronchial asthma',
                'ru_title' => 'Бронхиальная астма',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M210,76h3.684v1.842H210Z" transform="translate(-201.842 -72.957)" fill="#fff"/><path d="M210,.6V1.842h3.684V.6a.6.6,0,0,0-.6-.6H210.6A.6.6,0,0,0,210,.6Z" transform="translate(-201.842)" fill="#fff"/><path d="M17.938,94.051A6.964,6.964,0,0,0,12.969,92,1.17,1.17,0,0,0,11.8,93.165v1.165H8.2V93.165A1.17,1.17,0,0,0,7.031,92a6.961,6.961,0,0,0-4.969,2.051A6.887,6.887,0,0,0,0,98.993v8.158a1.17,1.17,0,0,0,1.172,1.165,7.022,7.022,0,0,0,7-6.4,2.909,2.909,0,0,1-1.234.523,1.753,1.753,0,0,1-1.665,1.215H4.58a1.754,1.754,0,0,1-1.65,1.165.583.583,0,1,1,0-1.165.583.583,0,1,0,0-1.165.583.583,0,1,1,0-1.165,1.754,1.754,0,0,1,1.65,1.165h.694a.583.583,0,1,0,0-1.165.583.583,0,1,1,0-1.165,1.758,1.758,0,0,1,1.629,1.1,1.747,1.747,0,0,0,1.3-1.681V98.41a.584.584,0,0,0,.586.583h2.422a.584.584,0,0,0,.586-.583v1.165a1.747,1.747,0,0,0,1.3,1.681,1.758,1.758,0,0,1,1.629-1.1.583.583,0,1,1,0,1.165.583.583,0,1,0,0,1.165h.694a1.754,1.754,0,0,1,1.65-1.165.583.583,0,1,1,0,1.165.583.583,0,1,0,0,1.165.583.583,0,1,1,0,1.165,1.754,1.754,0,0,1-1.65-1.165h-.694a1.753,1.753,0,0,1-1.665-1.215,2.909,2.909,0,0,1-1.234-.523,7.022,7.022,0,0,0,7,6.4A1.17,1.17,0,0,0,20,107.151V98.993A6.884,6.884,0,0,0,17.938,94.051ZM6.93,97.244A1.76,1.76,0,0,1,5.273,98.41a.583.583,0,1,1,0-1.165.583.583,0,1,0,0-1.165.583.583,0,1,1,0-1.165A1.76,1.76,0,0,1,6.93,96.079H13.07a1.76,1.76,0,0,1,1.657-1.165.583.583,0,1,1,0,1.165.583.583,0,1,0,0,1.165.583.583,0,1,1,0,1.165,1.76,1.76,0,0,1-1.657-1.165Z" transform="translate(0 -88.316)" fill="#fff"/></svg>',
            ),
            array(
                'id' => 5,
                'en_title' => 'Varicose veins',
                'ru_title' => 'Варикозная болезнь',
                'icon' => null,
            ),
            array(
                'id' => 6,
                'en_title' => 'Flexible joints',
                'ru_title' => 'Гибкие суставы',
                'icon' => null,
            ),
            array(
                'id' => 7,
                'en_title' => 'Hormones',
                'ru_title' => 'Гормоны',
                'icon' => null,
            ),
            array(
                'id' => 8,
                'en_title' => 'Flu and cold',
                'ru_title' => 'Грипп и простуда',
                'icon' => null,
            ),
            array(
                'id' => 9,
                'en_title' => 'Thick and strong hair',
                'ru_title' => 'Густые и крепкие волосы',
                'icon' => null,
            ),
            array(
                'id' => 10,
                'en_title' => 'Sensitive area',
                'ru_title' => 'Деликатная зона',
                'icon' => null,
            ),
            array(
                'id' => 11,
                'en_title' => 'For children',
                'ru_title' => 'Детям',
                'icon' => '<svg id="rocking-horse" xmlns="http://www.w3.org/2000/svg" width="19.182" height="17.754" viewBox="0 0 19.182 17.754"><path id="Контур_31" data-name="Контур 31" d="M225.2,192.946h2.326v3.489H225.2Z" transform="translate(-216.803 -186.485)" fill="#fff"/><path id="Контур_32" data-name="Контур 32" d="M18.335,91.8a7.257,7.257,0,0,1-1.36.78V87.724a3.928,3.928,0,0,0-3.934-3.914H11.918v3.914a.56.56,0,0,1-.562.559H10.232V90.52h.562a2.806,2.806,0,0,1,2.81,2.8v.245a22.927,22.927,0,0,1-3.934.314A22.8,22.8,0,0,1,5.1,93.445c.117-.345.281-.829.346-1.021a2.824,2.824,0,0,1,2.662-1.9h1V88.283H7.984a.56.56,0,0,1-.562-.559V82.859l-2.412-2.8a1.726,1.726,0,0,0-2.38,0l-2.023,2a1.679,1.679,0,0,0,0,2.378,1.739,1.739,0,0,0,2.394,0l.526-.531c.623,2.02-.349,4.795-1.218,7.275-.134.381-.4,1.166-.4,1.166a4.456,4.456,0,0,1-.83-.546.565.565,0,0,0-.795,0,.558.558,0,0,0,0,.791c1.879,1.85,6.584,2.4,9.389,2.4,2.7,0,7.551-.5,9.457-2.4a.555.555,0,0,0,0-.786A.567.567,0,0,0,18.335,91.8Z" transform="translate(-0.109 -77.238)" fill="#fff"/><path id="Контур_33" data-name="Контур 33" d="M.586,22.307l1.243-1.236a2.942,2.942,0,0,1,4.106,0L8.189,23.7V21.935a.582.582,0,0,0-.17-.411L6.754,20.257a4.035,4.035,0,0,0-2.876-1.2H3.868A4.033,4.033,0,0,0,1,20.244l-.826.826a.581.581,0,0,0,0,.822Z" transform="translate(-0.001 -19.054)" fill="#fff"/><path id="Контур_34" data-name="Контур 34" d="M412.279,162.946a2.314,2.314,0,0,0-1.6.647,5.218,5.218,0,0,1,2.765,4.587v1.163a.582.582,0,1,0,1.163,0v-4.071A2.329,2.329,0,0,0,412.279,162.946Z" transform="translate(-395.424 -157.67)" fill="#fff"/></svg>',
            ),
            array(
                'id' => 12,
                'en_title' => 'For liver health',
                'ru_title' => 'Для здоровья печени',
                'icon' => null,
            ),
            array(
                'id' => 13,
                'en_title' => "Women's health",
                'ru_title' => 'Женское здоровье',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="12.509" height="20" viewBox="0 0 12.509 20"><g id="Сгруппировать_220" data-name="Сгруппировать 220" transform="translate(-774 -1849)"><path id="female" d="M108.509,6.25A6.252,6.252,0,0,0,102.255,0h0A6.25,6.25,0,0,0,101,12.375V15H98.5v2.5H101V20h2.5V17.5h2.5V15h-2.5V12.375a6.253,6.253,0,0,0,5-6.125ZM102.255,10h0a3.75,3.75,0,1,1,0-7.5h0a3.75,3.75,0,1,1,0,7.5Z" transform="translate(678 1849)" fill="#fff"/></g></svg>',
            ),
            array(
                'id' => 14,
                'en_title' => 'Diseases of the urinary system',
                'ru_title' => 'Заболевания мочевыделительной системы',
                'icon' => null,
            ),
            array(
                'id' => 15,
                'en_title' => 'A healthy mind',
                'ru_title' => 'Здоровая психика',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="17.771" height="20" viewBox="0 0 17.771 20"><g transform="translate(-781 -1955)"><g transform="translate(752.463 1955)"><path d="M205.849,5.726a.881.881,0,0,0,1.376.661.741.741,0,0,1,1.16.61V9.451h1.837a2.049,2.049,0,1,1,3.98,0h1.856a3.844,3.844,0,0,0-3.037-5.9A2.927,2.927,0,0,0,208.386.667v3.66a.741.741,0,0,1-1.16.61A.881.881,0,0,0,205.849,5.726Z" transform="translate(-170.362 -0.075)" fill="#fff"/><path d="M31.655,9.376a.741.741,0,0,1,.61,1.16.88.88,0,1,0,1.451,0,.741.741,0,0,1,.61-1.16h2.492v-1.8a2.049,2.049,0,1,1,0-3.979V.592a2.931,2.931,0,0,0-4.643,2.845,3.852,3.852,0,0,0-3.018,5.939Z" transform="translate(0 0)" fill="#fff"/><path d="M278.628,207.916h-2.49a.741.741,0,0,1-.61-1.16.88.88,0,1,0-1.451,0,.741.741,0,0,1-.61,1.16h-2.492v1.8a2.049,2.049,0,1,1,0,3.979v3.046a2.931,2.931,0,0,0,4.643-2.845A3.869,3.869,0,0,0,278.628,207.916Z" transform="translate(-232.951 -197.33)" fill="#fff"/><path d="M39.363,274.348a.881.881,0,0,0-1.376-.789.741.741,0,0,1-1.16-.61V270.5H34.988a2.049,2.049,0,1,1-3.98,0H29.166a3.852,3.852,0,0,0,3.025,5.939,2.927,2.927,0,0,0,4.636,2.884v-3.7a.741.741,0,0,1,1.16-.61.881.881,0,0,0,1.376-.662Z" transform="translate(-0.008 -259.91)" fill="#fff"/></g></g></svg>',
            ),
            array(
                'id' => 16,
                'en_title' => 'Strong bones',
                'ru_title' => 'Крепкие кости',
                'icon' => null,
            ),
            array(
                'id' => 17,
                'en_title' => "Men's health",
                'ru_title' => 'Мужское здоровье',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g transform="translate(-1197 -1843)"><g transform="translate(1197 1842.999)"><g transform="translate(0 0.001)"><path d="M18.772,0H12.424V2.456h3.385L11.5,6.766l.04.04a7.3,7.3,0,1,0,1.655,1.655l.041.041,4.31-4.31V7.577H20V0ZM7.286,17.546a4.831,4.831,0,1,1,4.831-4.831A4.836,4.836,0,0,1,7.286,17.546Z" transform="translate(0 -0.001)" fill="#fff"/></g></g></g></svg>',
            ),
            array(
                'id' => 18,
                'en_title' => 'From migraines',
                'ru_title' => 'От мигрени',
                'icon' => null,
            ),
            array(
                'id' => 19,
                'en_title' => 'Excellent digestion',
                'ru_title' => 'Отличное пищеварение',
                'icon' => null,
            ),
            array(
                'id' => 20,
                'en_title' => 'Strains and injuries',
                'ru_title' => 'Растяжения и травмы',
                'icon' => null,
            ),
            array(
                'id' => 21,
                'en_title' => 'The heart is fine',
                'ru_title' => 'Сердце без хлопот',
                'icon' => null,
            ),
            array(
                'id' => 22,
                'en_title' => 'Laxatives',
                'ru_title' => 'Слабительные средства',
                'icon' => null,
            ),
            array(
                'id' => 23,
                'en_title' => 'Sleep',
                'ru_title' => 'Сон',
                'icon' => null,
            ),
            array(
                'id' => 24,
                'en_title' => 'Back without pain',
                'ru_title' => 'Спина без боли',
                'icon' => null,
            ),
            array(
                'id' => 25,
                'en_title' => 'Stomach ulcer',
                'ru_title' => 'Язва желудка',
                'icon' => null,
            ),
            array(
                'id' => 26,
                'en_title' => 'Pediatrics',
                'ru_title' => 'Педиатрия',
                'icon' => null,
            ),
            array(
                'id' => 27,
                'en_title' => 'Midwifery',
                'ru_title' => 'Акушерство',
                'icon' => null,
            ),
        );

        foreach ($productsCategories as $category) {
            $productsCategory = new ProductsCategory;
            $productsCategory->en_title = $category['en_title'];
            $productsCategory->ru_title = $category['ru_title'];
            if ($category['icon'] != null) {
                $productsCategory->icon = $category['icon'];
            } else {
            $productsCategory->icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 491.6 491.6"><path d="M394.65 224.2c1.2-8.7 1.8-17.6 1.8-26.6 0-109-88.7-197.6-197.6-197.6-109 0-197.6 88.7-197.6 197.6 0 109 88.7 197.6 197.6 197.6 7.9 0 15.7-.5 23.4-1.4 16.9 56.5 69.3 97.8 131.2 97.8 75.5 0 136.9-61.4 136.9-136.9 0-61.1-40.3-113-95.7-130.5zm-137.1 130.5c0-52.9 43-95.9 95.9-95.9 19 0 36.8 5.6 51.7 15.2l-132.5 132.4c-9.6-14.9-15.1-32.6-15.1-51.7zM42.15 197.6c0-86.4 70.3-156.6 156.6-156.6 35.8 0 68.8 12.1 95.3 32.4L74.55 292.8c-20.3-26.4-32.4-59.4-32.4-95.2zm61.4 124.2l219.5-219.5c20.3 26.4 32.4 59.4 32.4 95.3 0 6.9-.5 13.6-1.3 20.2h-.7c-75 0-136.1 60.6-136.9 135.4-5.8.7-11.7 1-17.7 1-35.8 0-68.9-12.1-95.3-32.4zm249.9 128.8c-19 0-36.8-5.6-51.7-15.2L434.15 303c9.6 14.9 15.2 32.7 15.2 51.7 0 52.9-43.1 95.9-95.9 95.9z"/></svg>';
            }
            $productsCategory->view_rate = Faker::create()->numberBetween($min = 0, $max = 27);
            $productsCategory->save();
        }
    }
}
