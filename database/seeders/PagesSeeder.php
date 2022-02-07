<?php
  
namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $pages = array(
      array(
        'id' => 1,
        'en_title' => 'Home',
        'ru_title' => 'Главная',
        'route' => 'home',
      ),
      array(
        'id' => 2,
        'en_title' => 'About Us',
        'ru_title' => 'О нас',
        'route' => 'about',
      ),
      array(
        'id' => 3,
        'en_title' => 'Products',
        'ru_title' => 'Продукты',
        'route' => 'products',
      ),
      array(
        'id' => 4,
        'en_title' => 'Industry News',
        'ru_title' => 'Новости отрасли',
        'route' => 'news',
      ),
      array(
        'id' => 5,
        'en_title' => 'Pharmacovigilance',
        'ru_title' => 'Фармаконадзор',
        'route' => 'contacts',
      ),
      array(
        'id' => 6,
        'en_title' => 'Contacts',
        'ru_title' => 'Контакты',
        'route' => 'contacts',
      ),
    );

    foreach ($pages as $page) {
      $table = new Page;
      $table->en_title = $page['en_title'];
      $table->ru_title = $page['ru_title'];
      $table->route = $page['route'];
      $table->save();
    }
  }
}
