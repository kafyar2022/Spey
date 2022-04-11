<?php

namespace Database\Seeders;

use App\Models\News;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $industryNews = array(
      array(
        'id' => 1,
        'category_id' => 1,
        'en_title' => 'Russian heparin to be: FAS approved a joint venture between Miratorg and Heparinus',
        'ru_title' => 'Российскому гепарину быть: ФАС одобрила совместное предприятие «Мираторга» и «Гепаринуса»',
      ),
      array(
        'id' => 2,
        'category_id' => 1,
        'en_title' => 'WHO issues guidelines for editing the human genome',
        'ru_title' => 'ВОЗ выпустила рекомендации по редактированию генома человека',
      ),
      array(
        'id' => 3,
        'category_id' => 1,
        'en_title' => 'American Purdue Pharma intends to compensate for the damage from the "opioid crisis"',
        'ru_title' => 'Американская Purdue Pharma намерена компенсировать ущерб от «опиоидного кризиса»',
      ),
      array(
        'id' => 4,
        'category_id' => 1,
        'en_title' => 'Medical startup attracted 200 million rubles of investments',
        'ru_title' => 'Медицинский стартап привлек 200 млн рублей инвестиций',
      ),
      array(
        'id' => 5,
        'category_id' => 2,
        'en_title' => 'Determined the neutralizing activity of antibodies after vaccination with "Sputnik V" against new variants of coronavirus',
        'ru_title' => 'Определена нейтрализующая активность антител после вакцинации «Спутником V» против новых вариантов коронавируса',
      ),
      array(
        'id' => 6,
        'category_id' => 2,
        'en_title' => 'First drug for treatment of plexiform neurofibromas in neurofibromatosis type 1 approved in EU',
        'ru_title' => 'В ЕС одобрен первый препарат для лечения плексиформных нейрофибром при нейрофиброматозе 1 типа',
      ),
      array(
        'id' => 7,
        'category_id' => 3,
        'en_title' => 'RDIF demands Reuters to investigate after Sputnik V article',
        'ru_title' => 'РФПИ потребовал от Reuters расследования после статьи о «Спутнике V»',
      ),
      array(
        'id' => 8,
        'category_id' => 3,
        'en_title' => 'Reconfiguring the immune response defeats antibiotic-resistant staphylococcus',
        'ru_title' => 'Перенастройка иммунного ответа побеждает устойчивый к антибиотикам стафилококк',
      ),
      array(
        'id' => 9,
        'category_id' => 3,
        'en_title' => 'Endopharm is preparing to produce opium drugs',
        'ru_title' => '«Эндофарм» готовится производить опийные лекарственные препараты',
      ),
      array(
        'id' => 10,
        'category_id' => 3,
        'en_title' => 'Tatiana Golikova - curator of programs for the development of healthcare and the medical industry',
        'ru_title' => 'Татьяна Голикова — куратор программ развития здравоохранения и медпромышленности',
      ),
      array(
        'id' => 11,
        'category_id' => 4,
        'en_title' => 'Only the Chinese have applied for the registration of their vaccine in Russia',
        'ru_title' => 'Заявку на регистрацию своей вакцины в России подали только китайцы',
      ),
      array(
        'id' => 12,
        'category_id' => 4,
        'en_title' => 'Russia prepares to create vaccines that can be quickly changed ',
        'ru_title' => 'Россия готовится создавать вакцины, состав которых можно быстро менять',
      ),
    );
    foreach ($industryNews as $news) {
      $table = new News;
      $table->category_id = $news['category_id'];
      $table->en_title = $news['en_title'];
      $table->ru_title = $news['ru_title'];
      $table->slug = SlugService::createSlug(News::class, 'slug', $news['ru_title']);
      $table->ru_text = "<p>«ФАС России удовлетворила ходатайство ООО “Агропромышленный комплекс “Мираторг” о даче предварительного согласия на приобретение доли в размере 50% в уставном капитале ООО “Гепаринус”, зарегистрированного в Курской области и входящего в группу компаний Van Hessen Group (Германия)», – говорится в сообщении ФАС, которое приводит издание.</p><p>В конце июня стало известно, что «Мираторг» подал соответствующую заявку в антимонопольное ведомство, планируя создать совместное предприятие по выпуску сырья для гепарина. Это вещество, получаемое из слизистой желудочно-кишечного тракта свиней, служит основой для лекарств, которые препятствуют образованию тромбов.</p><p>За время пандемии коронавирусной инфекции спрос на них вырос на 30%, по данным аналитиков. Однако до сих пор собственных субстанций для гепарина у России не было – еще недавно они все были привозными. К примеру, за 2020 год в страну доставили 20 тонн гепаринового сырья из-за границы, в основном из Китая, подсчитала компания RNC Pharma</p><p>Теперь же у России появится возможность выпускать собственное сырье для жизненно-важных препаратов. До сих пор владельцем 100% уставного капитала «Гепаринуса» был нидерландский концерн Van Hessen – поставщик&nbsp; субпродуктов из мяса, а также компонентов для фармацевтической отрасли, к которым относится основа для гепарина.</p>";
      $table->en_text = "<p>The biotech compound created by AstraZeneca, AZD7442, houses antibodies in a long-acting antibody combination for prophylaxis of symptomatic COVID-19. It is designed to contain the virus if someone becomes infected, which is different from COVID-19 vaccines that use the immune system of an individual to produce antibodies and cells that can fight off the virus.<br></p><p>Filing for the Emergency Use Authorization, the company has included data from its PROVENT Phase III trial, which showed a 77% reduction in risk of developing symptomatic COVID-19 without the need for a vaccine.</p><p>The therapy treatment, taken via two injections, could provide protection to those without a strong enough immune response to COVID-19 vaccines. It is designed to be effective for close to a year, providing protection from the virus.</p>";
      $table->view_rate = Faker::create()->numberBetween($min = 0, $max = 30);
      $table->save();
    }
  }
}
