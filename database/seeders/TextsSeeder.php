<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Seeder;

class TextsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $texts = array(
      array(
        'id' => 1,
        'page_id' => 1,
        'caption' => 'vitrin-title',
        'anchor' => 'vitrin',
        'en_text' => 'Health is a responsibility',
        'ru_text' => 'Здоровье - ответственность',
      ),
      array(
        'id' => 2,
        'page_id' => 1,
        'caption' => 'vitrin-text',
        'anchor' => 'vitrin',
        'en_text' => 'Our mission is to contribute to improving the health and well-being of people.',
        'ru_text' => 'Наша миссия - Способствовать улучшению здоровья и благополучия людей.',
      ),
      array(
        'id' => 3,
        'page_id' => 1,
        'caption' => 'our-values-title',
        'anchor' => 'values',
        'en_text' => 'Our values',
        'ru_text' => 'Наши ценности',
      ),
      array(
        'id' => 4,
        'page_id' => 1,
        'caption' => 'industry-news-title',
        'anchor' => 'news',
        'en_text' => 'Industry News',
        'ru_text' => 'Новости отрасли',
      ),
      array(
        'id' => 5,
        'page_id' => 1,
        'caption' => 'products-block-title',
        'anchor' => 'products',
        'en_text' => 'Products',
        'ru_text' => 'Продукты',
      ),
      array(
        'id' => 6,
        'page_id' => 1,
        'caption' => 'popular-products-title',
        'anchor' => 'popular-products',
        'en_text' => 'Most popular products',
        'ru_text' => 'Самые популярные товары',
      ),
      array(
        'id' => 7,
        'page_id' => 2,
        'caption' => 'vitrin-title',
        'anchor' => 'vitrin',
        'en_text' => 'About Us',
        'ru_text' => 'О нас',
      ),
      array(
        'id' => 8,
        'page_id' => 2,
        'caption' => 'vitrin-text',
        'anchor' => 'vitrin',
        'en_text' => 'To achieve our goals in the field of healthcare, we work together with representatives of large pharmacy chains and medical structures from different countries.',
        'ru_text' => 'Для достижения наших целей в области здравоохранения мы работаем вместе с представителями крупных аптечных сетей и медицинских структур из разных стран.',
      ),
      array(
        'id' => 9,
        'page_id' => 2,
        'caption' => 'our-history-title',
        'anchor' => 'history',
        'en_text' => 'Our history',
        'ru_text' => 'История компании',
      ),
      array(
        'id' => 10,
        'page_id' => 2,
        'caption' => 'present-time-title',
        'anchor' => 'present-time',
        'en_text' => 'Present time',
        'ru_text' => 'Настоящее время',
      ),
      array(
        'id' => 11,
        'page_id' => 2,
        'caption' => 'present-time-text',
        'anchor' => 'present-time',
        'en_text' => "<b>SPEY is an international pharmaceutical company founded in 2001</b><p>Our company is engaged in the development and marketing of high-quality and innovative pharmaceutical products for the needs of a wide range of therapeutic areas. All products are manufactured at production facilities equipped with advanced technology and approved by the world quality standards of the World Health Organization (WHO) and Good Manufacturing Practice (GMP).</p><br><p>In a short period of time, SPEY has become one of the most dynamically developing global pharmaceutical companies, with business connections in more than 20 countries around the world. Among them: Russia, Armenia, Azerbaijan, Georgia, CIS countries (Kazakhstan, Tajikistan, Uzbekistan, Turkmenistan and Kyrgyzstan), India, Nepal, Mongolia, Southeast Asian countries (Philippines, Vietnam, Cambodia, Myanmar) and markets in Africa and Latin America.</p><br><p>In today's society, SPEY strives to improve the quality of life of people with effective and affordable medicines. We are sure that successful projects are born from good ideas and their high-quality execution together with great talent.</p>",
        'ru_text' => "<b>SPEY - международная фармацевтическая компания, основанная в 2001 году</b><p>Наша компания занимается разработкой и маркетингом качественных и инновационных фармацевтических продуктов для нужд широкого спектра терапевтических направлений. Вся продукция производится на производственных мощностях, оснащенных передовыми технологиями и одобренных мировыми стандартами качества Всемирной организации здравоохранения (ВОЗ) и надлежащей производственной практикой (GMP).</p><br><p>За короткий период времени SPEY стала одной из наиболее динамично развивающихся глобальных фармацевтических компаний, имеющей деловые связи в более чем 20 странах мира. Среди них: Россия, Армения, Азербайджан, Грузия, страны СНГ (Казахстан, Таджикистан, Узбекистан, Туркменистан и Кыргызстан), Индия, Непал, Монголия, страны Юго-Восточной Азии (Филиппины, Вьетнам, Камбоджа, Мьянма) и рынки Африки и Латинской Америки</p><br><p>В современном обществе SPEY стремится улучшить качество жизни людей с помощью эффективных и доступных лекарств. Мы уверены, что успешные проекты рождаются из хороших идей, их качественного исполнения и большого таланта</p>",
      ),
      array(
        'id' => 12,
        'page_id' => 2,
        'caption' => 'company-number-title',
        'anchor' => 'companies',
        'en_text' => 'Company in numbers',
        'ru_text' => 'Компания в цифрах',
      ),
      array(
        'id' => 13,
        'page_id' => 2,
        'caption' => 'our-mission-title',
        'anchor' => 'mission-vision',
        'en_text' => 'Our mission',
        'ru_text' => 'Наша миссия',
      ),
      array(
        'id' => 14,
        'page_id' => 2,
        'caption' => 'our-mission-text',
        'anchor' => 'mission-vision',
        'en_text' => 'To contribute to improving the health and well-being of people.',
        'ru_text' => 'Способствовать улучшению здоровья и благополучия людей.',
      ),
      array(
        'id' => 15,
        'page_id' => 2,
        'caption' => 'our-vision-title',
        'anchor' => 'mission-vision',
        'en_text' => 'Our vision',
        'ru_text' => 'Наше видение',
      ),
      array(
        'id' => 16,
        'page_id' => 2,
        'caption' => 'our-vision-text',
        'anchor' => 'mission-vision',
        'en_text' => 'To be a leading company, recognized for quality and innovation.',
        'ru_text' => 'Быть лидирующей компанией, узнаваемой за качество и новаторство.',
      ),
      array(
        'id' => 17,
        'page_id' => 2,
        'caption' => 'rdp-title',
        'anchor' => 'rdp',
        'en_text' => 'Research, development and production areas',
        'ru_text' => 'Области исследований, разработок и производства',
      ),
      array(
        'id' => 18,
        'page_id' => 2,
        'caption' => 'rdp-text',
        'anchor' => 'rdp',
        'en_text' => "<p>In the pharmaceutical industry, it is always important to move forward - this is what the employees of our research centers in different countries are doing.</p><br><p>Specialists in the creation of new dosage forms have modern equipment and high-precision analytical devices at their disposal. SPEY already has many achievements in the pharmaceutical industry, and drug development continues.</p><br><h2>Today, the company is developing more than 30 new drugs in various dosage forms.</h2><br><p>The creative approach is based on the work of scientists and excellent equipment of laboratories - this is how we create new products and move the entire healthcare industry forward. All types of research are available to us, from research in the field of analytical chemistry to the evaluation of the final product on focus groups of patients.</p><br><p>We pay great attention to the issue of the production of drugs and choose the most modern production sites, which are located in several European countries, proven by time and quality control system. All of them work together with research centers and are equipped according to the standards of the World Health Organization and Good Manufacturing Practice.</p><br><p>These production sites are serviced by qualified employees - they are responsible for the production of really effective dosage forms. The production sites of our partners are constantly being improved, modern technological processes are being introduced on them. Quality audits are also regularly conducted, in which representatives of partner companies from different countries and state regulatory authorities take part.</p>",
        'ru_text' => "<p>В фармацевтической отрасли всегда важно двигаться вперед - этим занимаются сотрудники наших исследовательских центров в разных странах.</p><br><p>Специалисты по созданию новых лекарственных форм имеют в своем распоряжении современное оборудование и высокоточные аналитические приборы. SPEY уже имеет много достижений в фармацевтической промышленности, и разработка лекарств продолжается.</p><br><h2>Сегодня компания разрабатывает более 30 новых препаратов в различных лекарственных формах.</h2><br><p>Креативный подход основан на работе ученых и отличном оснащении лабораторий - именно так мы создаем новые продукты и продвигаем вперед всю отрасль здравоохранения. Нам доступны все виды исследований, от исследований в области аналитической химии до оценки конечного продукта на фокус-группах пациентов.</p><br><p>Мы уделяем большое внимание вопросу производства лекарств и выбираем самые современные производственные площадки, которые расположены в нескольких странах Европы, проверенные временем и системой контроля качества. Все они работают совместно с исследовательскими центрами и оборудованы по стандартам Всемирной организации здравоохранения и надлежащей производственной практики.</p><br><p>Эти производственные площадки обслуживают квалифицированные сотрудники - они отвечают за производство действительно эффективных лекарственных форм. Производственные площадки наших партнеров постоянно совершенствуются, на них внедряются современные технологические процессы. Также регулярно проводятся аудиты качества, в которых принимают участие представители компаний-партнеров из разных стран и государственных контролирующих органов.</p>",
      ),
      array(
        'id' => 19,
        'page_id' => 2,
        'caption' => 'geography-title',
        'anchor' => 'geography',
        'en_text' => 'Geography of presence',
        'ru_text' => 'География присутсвия',
      ),
      array(
        'id' => 20,
        'page_id' => 3,
        'caption' => 'vitrin-title',
        'anchor' => 'vitrin',
        'en_text' => 'Our products',
        'ru_text' => 'Наши продукты',
      ),
      array(
        'id' => 21,
        'page_id' => 3,
        'caption' => 'vitrin-text',
        'anchor' => 'vitrin',
        'en_text' => 'We pay great attention to the issue of the production of drugs and choose the most modern production sites, which are located in several European countries, proven by time and quality control system',
        'ru_text' => 'Мы уделяем большое внимание вопросу производства лекарств и выбираем самые современные производственные площадки, которые расположены в нескольких странах Европы, проверенные временем и системой контроля качества',
      ),
      array(
        'id' => 22,
        'page_id' => 3,
        'caption' => 'products-search-title',
        'anchor' => 'search',
        'en_text' => "Help to find what you're looking for",
        'ru_text' => 'Помогите найти то, что вы ищете',
      ),
      array(
        'id' => 23,
        'page_id' => 3,
        'caption' => 'products-search-title',
        'anchor' => 'search',
        'en_text' => "Help to find what you're looking for",
        'ru_text' => 'Помогите найти то, что вы ищете',
      ),
      array(
        'id' => 24,
        'page_id' => 3,
        'caption' => 'all-products-title',
        'anchor' => 'products',
        'en_text' => 'All products',
        'ru_text' => 'Все продукты',
      ),
      array(
        'id' => 25,
        'page_id' => 4,
        'caption' => 'vitrin-title',
        'anchor' => 'vitrin',
        'en_text' => 'Industry news',
        'ru_text' => 'Новости отрасли',
      ),
      array(
        'id' => 26,
        'page_id' => 4,
        'caption' => 'vitrin-text',
        'anchor' => 'vitrin',
        'en_text' => 'To achieve our goals in the field of healthcare, we work together with representatives of large pharmacy chains and medical structures from different countries.',
        'ru_text' => 'Для достижения наших целей в области здравоохранения мы работаем вместе с представителями крупных аптечных сетей и медицинских структур из разных стран.',
      ),
      array(
        'id' => 27,
        'page_id' => 4,
        'caption' => 'all-news-title',
        'anchor' => 'all-news',
        'en_text' => 'All news',
        'ru_text' => 'Все новости',
      ),
      array(
        'id' => 28,
        'page_id' => 6,
        'caption' => 'vitrin-title',
        'anchor' => 'vitrin',
        'en_text' => 'Contacts',
        'ru_text' => 'Контакты',
      ),
      array(
        'id' => 29,
        'page_id' => 6,
        'caption' => 'vitrin-text',
        'anchor' => 'vitrin',
        'en_text' => 'Write us if you have any questions, want to cooperate or have any questions about Pharmacovigilance',
        'ru_text' => 'Напишите нам, если у вас есть какие-либо вопросы, вы хотите сотрудничать или у вас есть вопросы по фармаконадзору',
      ),
      array(
        'id' => 30,
        'page_id' => 6,
        'caption' => 'cooperation-title',
        'anchor' => 'cooperation',
        'en_text' => 'Cooperation',
        'ru_text' => 'Сотрудничество',
      ),
      array(
        'id' => 31,
        'page_id' => 6,
        'caption' => 'cooperation-text',
        'anchor' => 'cooperation',
        'en_text' => "<p>We are ready to offer regular supplies of affordable and effective drugs in various therapeutic areas. It is possible to refine the products and expand its range to meet the customer's requirements.</p><br><p>SPEY is looking for buyers and partners interested both in the manufacture of new drugs and in maintaining existing forms. This allows us and those who cooperate with us to maintain a stronger market position.</p><br><p>We have accumulated extensive experience in the production of various dosage forms for different areas of medicine: dermatology, endocrinology, gynecology, cardiology and others. In each industry, SPEY has both its own developments and a pool of clients from among well-known international manufacturers, for whom their products are produced under contractual agreements.</p>",
        'ru_text' => '<p>Мы готовы предложить регулярные поставки недорогих и эффективных препаратов в различных терапевтических направлениях. Возможна доработка продукции и расширение ее ассортимента под требования заказчика.</p><br><p>SPEY ищет покупателей и партнеров, заинтересованных как в производстве новых лекарств, так и в сохранении существующих форм. Это позволяет нам и тем, кто с нами сотрудничает, сохранять более сильные позиции на рынке.</p><br><p>Нами накоплен большой опыт производства различных лекарственных форм для разных областей медицины: дерматологии, эндокринологии, гинекологии, кардиологии и других. В каждой отрасли SPEY имеет как собственные разработки, так и группу клиентов из числа известных международных производителей, для которых их продукция производится в соответствии с договорными соглашениями.</p>',
      ),
      array(
        'id' => 32,
        'page_id' => 6,
        'caption' => 'geography-title',
        'anchor' => 'geography-presence',
        'en_text' => 'Geography of presence',
        'ru_text' => 'География присутсвия',
      ),
      array(
        'id' => 33,
        'page_id' => 6,
        'caption' => 'pharmacovigilance-title',
        'anchor' => 'pharmacovigilance',
        'en_text' => 'Pharmacovigilance',
        'ru_text' => 'Фармаконадзор',
      ),
      array(
        'id' => 34,
        'page_id' => 6,
        'caption' => 'pharmacovigilance-text',
        'anchor' => 'pharmacovigilance',
        'en_text' => '<p class="pharmacovigilanc__text">You can report all adverse side reactions to Spey drugs:</p><br><p>By filling out the information on the website: <b>www.spey.com.ru</b><br>By sending the information by e-mail: <b>info@spey.com.ru</b><br>By calling a free round-the-clock phone: <b>8-800-600-00-00</b></p>',
        'ru_text' => '<p>Вы можете сообщать обо всех нежелательных побочных реакциях на препараты Спей:</p><br><p>Заполнив информацию на сайте: <b>www.spey.com.ru</b> <br>Отправив информацию по электронной почте: <b>info@spey.com.ru</b><br>Позвонив на бесплатный круглосуточный телефон: <b>8-800-600-00-00</b></p>',
      ),
      array(
        'id' => 35,
        'page_id' => 6,
        'caption' => 'contacts-form-title',
        'anchor' => 'form',
        'en_text' => 'Contact us via online form',
        'ru_text' => 'Свяжитесь с нами через онлайн-форму',
      ),
    );

    foreach ($texts as $text) {
      $table = new Text;
      $table->page_id = $text['page_id'];
      $table->caption = $text['caption'];
      $table->anchor = $text['anchor'];
      $table->en_text = $text['en_text'];
      $table->ru_text = $text['ru_text'];
      $table->save();
    }
  }
}
