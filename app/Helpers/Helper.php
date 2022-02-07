<?php

/**
 * Custom helper class
 * @author Ikrom Rahimov fleck97rgb@gmail.com
 */

namespace App\Helpers;

class Helper
{
  public static function addPagesContent($page, $locale, $keyword)
  {
    $texts = $page->texts;

    foreach ($texts as $text) {
      if ($keyword) {
        $page[$text->caption] = Helper::selectKeyword($keyword, $text[$locale . '_text']);
      } else {
        $page[$text->caption] = $text[$locale . '_text'];
      }
    }

    return $page;
  }

  public static function selectKeyword($keyword, $text)
  {
    return preg_replace("/(". $keyword . ")(?=[^>]*(<|$))/iu", "<span class='keyword-selected'>" . $keyword .  "</span>", $text);
  }

  public static function boldKeyword($keyword, $text)
  {
    return preg_replace("/" . $keyword . "/iu", "<span class='keyword-bold'>" . $keyword .  "</span>", $text);
  }
}
