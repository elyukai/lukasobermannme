<?php if ($endYear->isEmpty()) : ?><?= t('Since') ?> <?php snippet('date', ['year' => $startYear, 'month' => $startMonth, 'day' => $startDay]); else : snippet('date', ['year' => $startYear, 'month' => $startMonth, 'day' => $startDay]) ?>&ndash;<?php snippet('date', ['year' => $endYear, 'month' => $endMonth, 'day' => $endDay]); endif;
// prevent whitespace after closing tag
