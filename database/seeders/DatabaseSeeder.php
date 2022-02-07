<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $user = new User;
    $user->name = 'Админ';
    $user->login = 'admin';
    $user->role = 'admin';
    $password = 'admin';

    $user->password = bcrypt($password);
    $user->save();

    $this->call([
      SitesSeeder::class,
      ProductsCategoriesSeeder::class,
      ProductsSeeder::class,
      NewsCategoriesSeeder::class,
      NewsSeeder::class,
      HistoriesSeeder::class,
      PhonesSeeder::class,
      PagesSeeder::class,
      TextsSeeder::class,
      ValuesSeeder::class,
      CompaniesSeeder::class,
    ]);
  }
}
