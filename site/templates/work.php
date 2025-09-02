<?php snippet('layout', $page->isThemed()->toBool() ? [
  'style' => <<<EOT
    :root {
      --color-theme-background: {$page->colorBackground()->escape()};
      --color-theme-link: {$page->colorLink()->escape()};
      --color-theme-link-hover: {$page->colorLinkHover()->escape()};
      --color-theme-focus: {$page->colorFocus()->escape()};
      --color-theme-text: {$page->colorText()->escape()};
      --color-theme-text-90: {$page->colorText90()->escape()};
      --color-theme-text-80: {$page->colorText80()->escape()};
      --color-theme-text-70: {$page->colorText70()->escape()};
      --color-theme-text-60: {$page->colorText60()->escape()};
      --color-theme-text-50: {$page->colorText50()->escape()};
      --color-theme-text-40: {$page->colorText40()->escape()};
      --color-theme-text-30: {$page->colorText30()->escape()};
      --color-theme-text-20: {$page->colorText20()->escape()};
      --color-theme-text-10: {$page->colorText10()->escape()};
      --color-theme-selection-background: {$page->colorSelectionBackground()->escape()};

      --color-theme-dark-background: {$page->colorBackgroundDark()->escape()};
      --color-theme-dark-link: {$page->colorLinkDark()->escape()};
      --color-theme-dark-link-hover: {$page->colorLinkHoverDark()->escape()};
      --color-theme-dark-focus: {$page->colorFocusDark()->escape()};
      --color-theme-dark-text: {$page->colorTextDark()->escape()};
      --color-theme-dark-text-90: {$page->colorTextDark90()->escape()};
      --color-theme-dark-text-80: {$page->colorTextDark80()->escape()};
      --color-theme-dark-text-70: {$page->colorTextDark70()->escape()};
      --color-theme-dark-text-60: {$page->colorTextDark60()->escape()};
      --color-theme-dark-text-50: {$page->colorTextDark50()->escape()};
      --color-theme-dark-text-40: {$page->colorTextDark40()->escape()};
      --color-theme-dark-text-30: {$page->colorTextDark30()->escape()};
      --color-theme-dark-text-20: {$page->colorTextDark20()->escape()};
      --color-theme-dark-text-10: {$page->colorTextDark10()->escape()};
      --color-theme-dark-selection-background: {$page->colorSelectionBackgroundDark()->escape()};
    }
  EOT,
  'themeColorLight' => $page->colorBackground()->escape(),
  'themeColorDark' => $page->colorBackgroundDark()->escape(),
] : [], slots: true) ?>

<h1><?= $page->title()->html() ?></h1>

  <section class="description scaled--small">
    <h2 class="sr-only"><?= t('Description') ?></h2>
    <?= $page->description() ?>
  </section>
  <section class="key-data scaled--small">
    <h2 class="sr-only"><?= t('Key Data') ?></h2>
    <dl>
      <div>
        <dt><?= t('Scope') ?></dt>
        <?php foreach ($page->scopes()->split() as $scope) : ?>
        <dd><?= match ($scope) {
          'web' => t('Web Design'),
          'ui' => t('User Interface Design'),
          'ux' => t('User Experience Design'),
          'cd' => t('Corporate Design'),
          'gd' => t('Graphic Design'),
          'gamed' => t('Game Design'),
          'envd' => t('Environment Design'),
          'mg' => t('Motion Graphics'),
          'pm' => t('Project Management'),
          'frontenddev' => t('Frontend Development'),
          'backenddev' => t('Backend Development'),
          'appdev' => t('Application Development'),
          'cms' => t('Content Management Systems'),
          'seo' => t('Search Engine Optimization'),
          default => $scope,
        } ?></dd>
        <?php endforeach ?>
      </div>
      <?php if ($page->technologies()->isNotEmpty()) : ?>
      <div>
        <dt><?= t('Used technologies') ?></dt>
        <?php foreach ($page->technologies()->split() as $tech) : ?>
        <dd><?= $tech ?></dd>
        <?php endforeach ?>
      </div>
      <?php endif ?>
      <?php if ($page->tools()->isNotEmpty()) : ?>
      <div>
        <dt><?= t('Used tools') ?></dt>
        <?php foreach ($page->tools()->split() as $tool) : ?>
        <dd><?= $tool ?></dd>
        <?php endforeach ?>
      </div>
      <?php endif ?>
      <div>
        <dt><?= t('Time Frame') ?></dt>
        <dd><?php snippet(
          'datespan',
          [
            'startYear' => $page->startYear(),
            'startMonth' => $page->startMonth(),
            'startDay' => $page->startDay(),
            'endYear' => $page->endYear(),
            'endMonth' => $page->endMonth(),
            'endDay' => $page->endDay(),
          ]
        ) ?></dd>
      </div>
      <div>
        <dt><?= t('Project Type') ?></dt>
        <?php foreach ($page->projectType()->split() as $projectType) : ?>
        <dd><?= match ($projectType) {
          'hobby' => t('Hobby'),
          'assignment' => t('University Assignment'),
          'commission' => t('Commission'),
          default => $projectType,
        } ?></dd>
        <?php endforeach ?>
      </div>
      <?php
      $teamMembers = $page->teamMembers()->toStructure();
      if (!$teamMembers->isEmpty()) : ?>
      <div>
        <dt><?= t('Team Members') ?></dt>
        <?php foreach ($teamMembers as $teamMember) : ?>
        <dd><?= $teamMember->name()->smartypants() ?></dd>
        <?php endforeach ?>
      </div>
      <?php endif ?>
      <?php
      $links = $page->links()->toStructure();
      if (!$links->isEmpty()) : ?>
      <div>
        <dt><?= t('Links') ?></dt>
        <?php foreach ($links as $link) : ?>
        <dd><a href="<?= $link->url()->html() ?>"><?= $link->name()->smartypants() ?></a></dd>
        <?php endforeach ?>
      </div>
      <?php endif ?>
    </dl>
  </section>
</div>

<a href="<?= $page->parent()->url() ?>" class="back scaled--small">← <?= t('View all works') ?></a>
