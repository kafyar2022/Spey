<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Seeder;

class ValuesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $values = array(
      array(
        'id' => 1,
        'en_title' => 'Life',
        'ru_title' => 'Жизнь',
        'en_text' => 'We recognize life as a gift that needs to be cherished.',
        'ru_text' => 'Мы признаем жизнь подарком, который нужно беречь.',
      ),
      array(
        'id' => 2,
        'en_title' => 'Creation',
        'ru_title' => 'Творчество',
        'en_text' => 'We are discovering new facets of the possible.',
        'ru_text' => 'Мы открываем новые грани возможного.',
      ),
      array(
        'id' => 3,
        'en_title' => 'Responsibility',
        'ru_title' => 'Ответсвенность',
        'en_text' => 'We are responsible for the well-being of society.',
        'ru_text' => 'Мы несем ответственность за благополучие общества.',
      ),
      array(
        'id' => 4,
        'en_title' => 'Team spirit',
        'ru_title' => 'Командный дух',
        'en_text' => 'We are united and achieve our goals.',
        'ru_text' => 'Мы едины и достигаем поставленных целей.',
      ),
      array(
        'id' => 5,
        'en_title' => 'Professionalism',
        'ru_title' => 'Профессионализм',
        'en_text' => 'We show a high level of working skills.',
        'ru_text' => 'Показываем высокий уровень рабочих навыков.',
      ),
      array(
        'id' => 6,
        'en_title' => 'Relationship',
        'ru_title' => 'Отношение',
        'en_text' => "We value everyone's opinion.",
        'ru_text' => 'Мы ценим мнение каждого.',
      ),
    );

    foreach ($values as $value) {
      $table = new Value;
      $table->en_title = $value['en_title'];
      $table->ru_title = $value['ru_title'];
      $table->en_text = $value['en_text'];
      $table->ru_text = $value['ru_text'];
      $table->save();
    }

  }
}
