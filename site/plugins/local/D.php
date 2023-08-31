<?php

namespace Kirby\Toolkit;

use DateTimeImmutable;
use IntlDateFormatter;
use IntlDatePatternGenerator;

/**
 * Helpers for working with dates.
 */
class D
{
  /**
   * Formats a date.
   *
   * @param int $year
   * @param int|null $month
   * @param int|null $day
   * @param array $format An associative array, where `'ymd'` sets the format
   * for year, month and day, `'ym'` for year and month and `'y'` for year.
   */
  public static function format(int $year, ?int $month = null, ?int $day = null, array $format = []): string
  {
    $locale = kirby()->language()->locale(LC_ALL);
    $formatGenerator = IntlDatePatternGenerator::create($locale);
    $formatter = IntlDateFormatter::create($locale);

    if ($month) {
      if ($day) {
        $formatter->setPattern($formatGenerator->getBestPattern(array_key_exists('ymd', $format) ? $format['ymd'] : 'dMMMyyyy'));
        $date = (new DateTimeImmutable())->setDate($year, $month, $day);
        return $formatter->format($date);
      }

      $formatter->setPattern($formatGenerator->getBestPattern(array_key_exists('ym', $format) ? $format['ym'] : 'MMMyyyy'));
      $date = (new DateTimeImmutable())->setDate($year, $month, 1);
      return $formatter->format($date);
    }

    $formatter->setPattern($formatGenerator->getBestPattern(array_key_exists('y', $format) ? $format['y'] : 'yyyy'));
    $date = (new DateTimeImmutable())->setDate($year, 1, 1);
    return $formatter->format($date);
  }
  /**
   * Formats a date as partial ISO string.
   *
   * @param int $year
   * @param int|null $month
   * @param int|null $day
   */
  public static function formatISO(int $year, ?int $month = null, ?int $day = null): string
  {
    if ($month) {
      if ($day) {
        return "$year-$month-$day";
      }

      return "$year-$month";
    }

    return "$year";
  }
}
