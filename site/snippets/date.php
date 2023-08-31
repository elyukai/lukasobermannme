<?php
use Kirby\Toolkit\D;
$year = $year->toInt();
$month = $month->toInt();
$day = $day->toInt();
?><time datetime="<?= D::formatISO($year, $month, $day) ?>"><?= D::format($year, $month, $day) ?></time><?php
; // prevent whitespace after closing tag
