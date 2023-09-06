<?php snippet('layout', slots: true) ?>

<h1 class="aos"><?= $page->title()->html() ?></h1>

<?php snippet("gallery", ["files" => $page->gallery()->toFiles()]) ?>

<div class="work-information scaled--small">
  <section class="description scaled--small aos">
    <h2 class="sr-only"><?= t('Description') ?></h2>
    <?= $page->description()->kirbytext() ?>
  </section>
  <section class="key-data scaled--small aos">
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
      <div>
        <dt><?= t('Used technologies') ?></dt>
        <?php foreach ($page->technologies()->split() as $tech) : ?>
        <dd><?= $tech ?></dd>
        <?php endforeach ?>
      </div>
      <div>
        <dt><?= t('Used tools') ?></dt>
        <?php foreach ($page->tools()->split() as $tool) : ?>
        <dd><?= $tool ?></dd>
        <?php endforeach ?>
      </div>
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

<a href="<?= $page->parent()->url() ?>" class="back scaled--small aos">← <?= t('View all works') ?></a>
