<?php

require_once __DIR__ . '/D.php';

use Kirby\Cms\App;
use Kirby\Cms\App as Kirby;
use Kirby\Filesystem\F;
use Kirby\Http\Url;

Kirby::plugin('lukasobermann/local', [
   'components' => [
      'css' => function (App $kirby, string $url, $options = null): string {
          $relative_url = Url::path($url, false);
          $file_root = $kirby->root('index') . '/' . $relative_url;

          if (F::exists($file_root)) {
              return url($relative_url . '?' . F::modified($file_root));
          }

          return $url;
      },
      'js' => function (App $kirby, string $url, $options = null): string {
          $relative_url = Url::path($url, false);
          $file_root = $kirby->root('index') . '/' . $relative_url;

          if (F::exists($file_root)) {
              return url($relative_url . '?' . F::modified($file_root));
          }

          return $url;
      }
  ]
]);
