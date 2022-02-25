<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SitesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Spey sites according to country locations
    $sites = array(
      array(
        'id' => 1,
        'en_title' => 'Europe',
        'ru_title' => 'Европа',
        'en_location' => 'Spey in Europe',
        'ru_location' => 'Spey в Европе',
        'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d23682367.238464795!2d21.486589822507256!3d43.56667570684504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1635482910688!5m2!1sru!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
        'en_address' => '',
        'ru_address' => '',
        'email' => 'info@spey.eu',
        'link' => 'https://spey.eu',
      ),
      array(
        'id' => 2,
        'en_title' => 'Greece',
        'ru_title' => 'Греция',
        'en_location' => 'Spey in Greece',
        'ru_location' => 'Spey в Греции',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1jkbc_9BZeYbq2fyza87_HZEFKtU-f8nP&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => '',
        'ru_address' => '',
        'email' => 'info@spey.gr',
        'link' => 'https://spey.gr',
      ),
      array(
        'id' => 3,
        'en_title' => 'Portugal',
        'ru_title' => 'Португалия',
        'en_location' => 'Spey in Portugal',
        'ru_location' => 'Spey в Португалии',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1jkbc_9BZeYbq2fyza87_HZEFKtU-f8nP&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => '',
        'ru_address' => '',
        'email' => 'info@spey.pt',
        'link' => 'https://spey.pt',
      ),
      array(
        'id' => 4,
        'en_title' => 'Bulgaria',
        'ru_title' => 'Болгария',
        'en_location' => 'Spey in Bulgaria',
        'ru_location' => 'Spey в Болгарии',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1jkbc_9BZeYbq2fyza87_HZEFKtU-f8nP&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => '',
        'ru_address' => '',
        'email' => 'info@spey.bg',
        'link' => 'https://spey.bg',
      ),
      array(
        'id' => 5,
        'en_title' => 'Russia',
        'ru_title' => 'Россия',
        'en_location' => 'Spey in Russia',
        'ru_location' => 'Spey в России',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1GE4P5u5i0PunARSOxI4F_FMHMgMD0T41&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => '23 Osenniy Boulvar, BC Krylatsky, <br> 121609, Russia, Moscow',
        'ru_address' => 'Осенний бульвар, 23, БЦ Крылатский, 121609, Россия, г. Москва',
        'email' => 'info@spey.com.ru',
        'link' => 'https://spey.com.ru',
      ),
      array(
        'id' => 6,
        'en_title' => 'Georgia',
        'ru_title' => 'Грузия',
        'en_location' => 'Spey in Georgia',
        'ru_location' => 'Spey в Грузии',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1oelE051PXpfwUZPTZkTtzMVkbKF82q1c&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => '',
        'ru_address' => '',
        'email' => 'info@spey.ge',
        'link' => 'https://spey.ge',
      ),
      
      array(
        'id' => 7,
        'en_title' => 'Armenia',
        'ru_title' => 'Армения',
        'en_location' => 'Spey in Armenia',
        'ru_location' => 'Spey в Армении',
        'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1560676.9097720957!2d44.567642!3d40.1824271!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40155684e773bac7%3A0xd0b4757aeb822d23!2z0JDRgNC80LXQvdC40Y8!5e0!3m2!1sru!2s!4v1644568027606!5m2!1sru!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
        'en_address' => '',
        'ru_address' => '',
        'email' => 'info@spey.am',
        'link' => 'https://spey.am',
      ),
      array(
        'id' => 8,
        'en_title' => 'Philippines',
        'ru_title' => 'Филиппины',
        'en_location' => 'Spey in Philippines',
        'ru_location' => 'Spey в Филиппинах',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1-l-vcoohYcAEPlVdX0bs1xJciDnSBtEK&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => 'Unit 2305, 23/F Medical Plaza Ortigas, 25 San Miguel Ave., Ortigas Center, Pasig City',
        'ru_address' => 'Блок 2305, 23/F Медикал Плаза Ортигас, проспект Сан-Мигель 25, центр Ортигас, город Пасиг',
        'email' => 'info@spey.ph',
        'link' => 'https://spey.ph',
      ),
      array(
        'id' => 9,
        'en_title' => 'Cambodia',
        'ru_title' => 'Камбоджа',
        'en_location' => 'Spey in Cambodia',
        'ru_location' => 'Spey в Камбодже',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1pSfL-vzxG55zF4cLexjXZazv2co4GTSQ&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => 'No. 147, Str. 1015, Sangkat Phnom Penh Thmey, Khan Sen Sok, Phnom Pehn, 12101 Kingdom of Cambodia',
        'ru_address' => '147, ул. 1015, Сангкат Пномпень Тмей, Хан Сен Сок, Пномпень, 12101 Королевство Камбоджа',
        'email' => 'dsm@spey.com.kh',
        'link' => 'https://spey.com.kh',
      ),
      array(
        'id' => 10,
        'en_title' => 'Dominicana',
        'ru_title' => 'Доминикан',
        'en_location' => 'Spey in Dominicana',
        'ru_location' => 'Spey в Доминикане',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1jkbc_9BZeYbq2fyza87_HZEFKtU-f8nP&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => '',
        'ru_address' => '',
        'email' => 'info@spey.do',
        'link' => 'https://spey.do',
      ),
      array(
        'id' => 11,
        'en_title' => 'Kazakhstan',
        'ru_title' => 'Казахстан',
        'en_location' => 'Spey in Kazakhstan',
        'ru_location' => 'Spey в Казахстане',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1gVTmH4RI5Z4o7N2du49IhC5l57hsOxTk&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => 'Kazybek bi, 50, office 100, 050000, Almaty, Republic of Kazakhstan',
        'ru_address' => 'Казыбек би, 50, офис 100, 050000, Алматы, Республика Казахстан',
        'email' => 'info@spey.kz',
        'link' => 'https://spey.kz',
      ),
      array(
        'id' => 12,
        'en_title' => 'India',
        'ru_title' => 'Индия',
        'en_location' => 'Spey in India',
        'ru_location' => 'Spey в Индии',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=12iLADiOYe5zW7BEz4m5GA7hYNYe1FaKS&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => '1101-1108, 11th Floor, Imperia Mindspace, Golf Course Ext. Road, Sector 62 Gurugram, Haryana 122413, India.',
        'ru_address' => 'Cектор 62 Гуруграм, Харьяна 122413, Индия.',
        'email' => 'info@spey.in',
        'link' => 'https://spey.in'
      ),
      array(
        'id' => 13,
        'en_title' => 'Uzbekistan',
        'ru_title' => 'Узбекистан',
        'en_location' => 'Spey in Uzbekistan',
        'ru_location' => 'Spey в Узбекистане',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1lLS8FJDUFCy62YyNDxUeAix1gKEGxxJE&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => 'Republic of Uzbekistan, Tashkent, Yakkasaray district, st. Zarbog 23 A',
        'ru_address' => 'Республика Узбекистан, г. Ташкент, Яккасарайский р-н, ул. Зарбог 23 А',
        'email' => 'uz.rep@spey.eu',
        'link' => 'https://spey.uz',
      ),
      array(
        'id' => 14,
        'en_title' => 'Kyrgyzstan',
        'ru_title' => 'Кыргызстан',
        'en_location' => 'Spey in Kyrgyzstan',
        'ru_location' => 'Spey в Кыргызстане',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ZkYPc9W2kGlv8C_2L3T88ASQTz-V2iNg&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => 'Toktogul 170A, 2nd floor, apt. 2, Bishkek, Kyrgyz Republic',
        'ru_address' => 'Токтогула 170А, 2-ой этаж, кв. 2, Бишкек, Кыргызская Республика',
        'email' => 'info@spey.kg',
        'link' => 'https://spey.kg',
      ),
      array(
        'id' => 15,
        'en_title' => 'Tajikistan',
        'ru_title' => 'Таджикистан',
        'en_location' => 'Spey in Tajikistan',
        'ru_location' => 'Spey в Таджикистане',
        'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ZJNEN2AbPKNZg9gXgqCuQQNJyPm350em&ehbc=2E312F" width="640" height="480"></iframe>',
        'en_address' => 'st. Shamsi, 4B, 734000, Dushanbe, Tajikistan',
        'ru_address' => 'ул. Шамси, 4Б, 734000, Душанбе, Таджикистан',
        'email' => 'info@spey.tj',
        'link' => 'https://spey.tj',
      ),
    );

    foreach ($sites as $site) {
      $speySite = new Site;
      $speySite->en_title = $site['en_title'];
      $speySite->ru_title = $site['ru_title'];
      $speySite->en_location = $site['en_location'];
      $speySite->ru_location = $site['ru_location'];
      $speySite->map = $site['map'];
      $speySite->en_address = $site['en_address'];
      $speySite->ru_address = $site['ru_address'];
      $speySite->email = $site['email'];
      $speySite->link = $site['link'];
      $speySite->save();
    }
  }
}
