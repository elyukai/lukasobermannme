<?php

return [
  'debug' => false,
  'cache' => [
    'pages' => [
      'active' => true
    ]
  ],
  'smartypants' => [
    'attr' => 2,
    'do.dashes' => 2,
    'do.ellipses' => 1,
    'do.guillemets' => 1,
    'do.space.endash' => 2
  ],
  'languages' => true,
  'smartypants' => true,
  'date'  => [
    'handler' => 'intl'
  ],
  'routes' => [
    [
      'pattern' => 'sitemap.xml',
      'action'  => function() {
          $pages = site()->pages()->index();

          // fetch the pages to ignore from the config settings,
          // if nothing is set, we ignore the error page
          $ignore = kirby()->option('sitemap.ignore', ['error']);

          $content = snippet('sitemap', compact('pages', 'ignore'), true);

          // return response with correct header type
          return new Kirby\Cms\Response($content, 'application/xml');
      }
    ],
    [
      'pattern' => 'sitemap',
      'action'  => function() {
        return go('sitemap.xml', 301);
      }
    ]
  ],
  'tobimori.seo' => [
    'robots' => [
      'sitemap' => 'https://lukasobermann.me/sitemap.xml',
    ]
  ],
];
