<?php

namespace Database\Seeders;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();
    $products = array(
      array('id' => 1, 'category_id' => 1, 'en_title' => 'Cvetox', 'ru_title' => 'Цветокс'),
      array('id' => 2, 'category_id' => 2, 'en_title' => 'Ceftriaxone', 'ru_title' => 'Цефтриаксон'),
      array('id' => 3, 'category_id' => 2, 'en_title' => 'Cefyaps', 'ru_title' => 'Цевяпс'),
      array('id' => 4, 'category_id' => 2, 'en_title' => 'Dometaksim', 'ru_title' => 'Дометаксим'),
      array('id' => 5, 'category_id' => 2, 'en_title' => 'Tomyclar', 'ru_title' => 'Томиклар'),
      array('id' => 6, 'category_id' => 3, 'en_title' => 'Gervetin', 'ru_title' => 'Герветин'),
      array('id' => 7, 'category_id' => 3, 'en_title' => 'Gervetin', 'ru_title' => 'Герветин'),
      array('id' => 8, 'category_id' => 3, 'en_title' => 'Gervetin', 'ru_title' => 'Герветин'),
      array('id' => 9, 'category_id' => 4, 'en_title' => 'Divlaxin', 'ru_title' => 'Дивлаксин'),
      array('id' => 10, 'category_id' => 4, 'en_title' => 'Divlaxin', 'ru_title' => 'Дивлаксин'),
      array('id' => 11, 'category_id' => 4, 'en_title' => 'Divlaxin', 'ru_title' => 'Дивлаксин'),
      array('id' => 12, 'category_id' => 5, 'en_title' => 'Diosperidin', 'ru_title' => 'Диосперидин'),
      array('id' => 13, 'category_id' => 6, 'en_title' => 'Hondrospey', 'ru_title' => 'Хондроспей'),
      array('id' => 14, 'category_id' => 7, 'en_title' => 'Slideron', 'ru_title' => 'Слидерон'),
      array('id' => 15, 'category_id' => 7, 'en_title' => 'Slideron', 'ru_title' => 'Слидерон'),
      array('id' => 16, 'category_id' => 7, 'en_title' => 'Slideron', 'ru_title' => 'Слидерон'),
      array('id' => 17, 'category_id' => 8, 'en_title' => 'Ektorins-C', 'ru_title' => 'Экторинс-С'),
      array('id' => 18, 'category_id' => 9, 'en_title' => 'Revard', 'ru_title' => 'Ревард'),
      array('id' => 19, 'category_id' => 10, 'en_title' => 'Proctaluron', 'ru_title' => 'Прокталурон'),
      array('id' => 20, 'category_id' => 11, 'en_title' => 'Lactospey baby', 'ru_title' => 'Лактоспей беби'),
      array('id' => 21, 'category_id' => 11, 'en_title' => 'Lactospey drink', 'ru_title' => 'Лактоспей дринк'),
      array('id' => 22, 'category_id' => 11, 'en_title' => 'Lactospey drops', 'ru_title' => 'Лактоспей дропс'),
      array('id' => 23, 'category_id' => 11, 'en_title' => 'Lactospey kids', 'ru_title' => 'Лактоспей кидс'),
      array('id' => 24, 'category_id' => 11, 'en_title' => 'Polveren', 'ru_title' => 'Полверен'),
      array('id' => 25, 'category_id' => 11, 'en_title' => 'Rovalang', 'ru_title' => 'Роваланг'),
      array('id' => 26, 'category_id' => 11, 'en_title' => 'Zentavex', 'ru_title' => 'Зентавекс'),
      array('id' => 27, 'category_id' => 12, 'en_title' => 'Arginda', 'ru_title' => 'Аргинда'),
      array('id' => 28, 'category_id' => 13, 'en_title' => 'Airlene', 'ru_title' => 'Айрлин'),
      array('id' => 29, 'category_id' => 13, 'en_title' => 'Folispey', 'ru_title' => 'Фолиспей'),
      array('id' => 30, 'category_id' => 13, 'en_title' => 'Ginestat', 'ru_title' => 'Гинестат'),
      array('id' => 31, 'category_id' => 13, 'en_title' => 'Lilaiz rose', 'ru_title' => 'Лилайз роза'),
      array('id' => 32, 'category_id' => 13, 'en_title' => 'Magnispey pregna', 'ru_title' => 'Магниспей прегна'),
      array('id' => 33, 'category_id' => 13, 'en_title' => 'Myomex', 'ru_title' => 'Миомекс'),
      array('id' => 34, 'category_id' => 14, 'en_title' => 'Antikamen', 'ru_title' => 'Антикамен'),
      array('id' => 35, 'category_id' => 14, 'en_title' => 'Berrylact', 'ru_title' => 'Берилакт'),
      array('id' => 36, 'category_id' => 15, 'en_title' => 'Avtoriya', 'ru_title' => 'Автория'),
      array('id' => 37, 'category_id' => 15, 'en_title' => 'Drualix', 'ru_title' => 'Друаликс'),
      array('id' => 38, 'category_id' => 15, 'en_title' => 'Ferzapin', 'ru_title' => 'Ферзапин'),
      array('id' => 39, 'category_id' => 15, 'en_title' => 'Ferzapin', 'ru_title' => 'Ферзапин'),
      array('id' => 40, 'category_id' => 15, 'en_title' => 'Parsolet', 'ru_title' => 'Парсолет'),
      array('id' => 41, 'category_id' => 15, 'en_title' => 'Respongil', 'ru_title' => 'Респонгил'),
      array('id' => 42, 'category_id' => 15, 'en_title' => 'Respongil', 'ru_title' => 'Респонгил'),
      array('id' => 43, 'category_id' => 16, 'en_title' => 'Boneost', 'ru_title' => 'Бонеост'),
      array('id' => 44, 'category_id' => 17, 'en_title' => 'Libidance', 'ru_title' => 'Либиданс'),
      array('id' => 45, 'category_id' => 17, 'en_title' => 'Omarens', 'ru_title' => 'Омаренс'),
      array('id' => 46, 'category_id' => 17, 'en_title' => 'Omarens T', 'ru_title' => 'Омаренс Т'),
      array('id' => 47, 'category_id' => 18, 'en_title' => 'Ritazum', 'ru_title' => 'Ритазум'),
      array('id' => 48, 'category_id' => 18, 'en_title' => 'Ritazum', 'ru_title' => 'Ритазум'),
      array('id' => 49, 'category_id' => 19, 'en_title' => 'Lactospey entero', 'ru_title' => 'Лактоспей энтеро'),
      array('id' => 50, 'category_id' => 19, 'en_title' => 'Lactospey plus', 'ru_title' => 'Лактоспей плюс'),
      array('id' => 51, 'category_id' => 20, 'en_title' => 'Inforin', 'ru_title' => 'Инфорин'),
      array('id' => 52, 'category_id' => 20, 'en_title' => 'Inforin active', 'ru_title' => 'Инфорин'),
      array('id' => 53, 'category_id' => 21, 'en_title' => 'Karnivel', 'ru_title' => 'Карнивел'),
      array('id' => 54, 'category_id' => 21, 'en_title' => 'Karnivel', 'ru_title' => 'Карнивел'),
      array('id' => 55, 'category_id' => 22, 'en_title' => 'Bisokodil', 'ru_title' => 'Бисокодил'),
      array('id' => 56, 'category_id' => 23, 'en_title' => 'Sonlife', 'ru_title' => 'Сонлайф'),
      array('id' => 57, 'category_id' => 24, 'en_title' => 'Regimed', 'ru_title' => 'Регимед'),
      array('id' => 58, 'category_id' => 24, 'en_title' => 'Regimed', 'ru_title' => 'Регимед'),
      array('id' => 59, 'category_id' => 24, 'en_title' => 'Tenovix', 'ru_title' => 'Теновикс'),
      array('id' => 60, 'category_id' => 25, 'en_title' => 'Pantospey', 'ru_title' => 'Пантоспей'),
      array('id' => 61, 'category_id' => 25, 'en_title' => 'Pantospey', 'ru_title' => 'Пантоспей'),
      array('id' => 62, 'category_id' => 25, 'en_title' => 'Pantospey', 'ru_title' => 'Пантоспей'),
    );

    foreach ($products as $product) {
      $speyProduct = new Product;
      $speyProduct->category_id = $product['category_id'];
      $speyProduct->en_title = $product['en_title'];
      $speyProduct->ru_title = $product['ru_title'];
      $speyProduct->slug = SlugService::createSlug(Product::class, 'slug', $product['ru_title']);
      $speyProduct->en_instruction = 'en_instruction.pdf';
      $speyProduct->ru_instruction = 'ru_instruction.pdf';
      $speyProduct->en_composition = '<p>Each sachet contains:</p><br><b>Active ingredients:</b><br><br><p>Bifidobacteria BB-12® 1.0 billion CFU**<br>Streptococcus thermophilic 1.0 billion CFU**<br>Inulin 25 mg</p><br><p>Amount of Bacteria present at the time of manufacture.</p><br><p><b>Excipients:</b> crystalline glucose.</p>';
      $speyProduct->ru_composition = '<p>1 пакетик содержит:</p><br><b>Активные вещества:</b><br><br><p>Бифидобактерии BB-12® 1,0 млрд КОЕ**<br>Стрептококк термофильный 1,0 млрд КОЕ **<br>Инулин 25 мг</p><br><p>Количество бактерий, присутствующих на момент изготовления</p><br><p><b>Вспомогательные вещества:</b> кристаллическая глюкоза.</p>';
      $speyProduct->en_indications = '<p>Inside, during meals.</p><br><p>For infants over 1 month of life, 1 sachet per day.</p><br><p>Children over 1 year old take 1-2 sachets a day.</p><br><p>Open the bag and mix the contents with milk, juice, or any other type of baby food. Do not mix the contents of the sachet with hot drinks - the temperature of the product should not exceed 35 ° C.</p><br><p>The duration of admission depends on the cause of the development of the upset stomach and the individual characteristics of the organism.</p>';
      $speyProduct->ru_indications = '<p>Внутрь, во время еды.</p><br><p>Младенцам более 1 месяца жизни по 1 саше в день.</p><br><p>Детям старше 1 года по 1-2 пакетика в день.</p><br><p>Откройте пакетик и смешайте его содержимое с молоком, соком или другим видом детского питания. Не смешивать содержимое пакетика с горячими напитками - температура продукта должна быть не выше 35°С.</p><br><p>Длительность приёма зависит от причины развития расстройства в желудке и индивидуальных особенностей организма.</p>';
      $speyProduct->en_description = 'Lactospey® Baby a combination of beneficial probiotic bacteria, designed for children from the first days of life and adults.';
      $speyProduct->ru_description = 'Lactospey® Baby - это сочетание полезных пробиотических бактерий, предназначенное для детей с первых дней жизни и взрослых.';
      $speyProduct->recipe = Faker::create()->numberBetween($min = 0, $max = 1);
      $speyProduct->view_rate = Faker::create()->numberBetween($min = 0, $max = 27);
      $speyProduct->save();
    }
  }
}
