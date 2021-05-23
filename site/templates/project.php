<?php snippet("header") ?>

<div class="title title--cover">
  <div class="wrapper">
    <?php snippet("slideshow", ["files" => $page->gallery()->toFiles()]) ?>
    <h1><?= $page->title()->smartypants() ?></h1>
  </div>
</div>
<section>
  <div class="wrapper">
    <?= $page->description()->kirbytext() ?>
    <dl class="key-data">
      <div>
        <dt>Scope</dt>
        <?php foreach ($page->scopes()->split() as $scope) : ?>
          <dd><?= $scope ?></dd>
        <?php endforeach ?>
      </div>
      <?php if (!$page->technologies()->isEmpty()) : ?>
        <div>
          <dt>Used technologies</dt>
          <?php foreach ($page->technologies()->split() as $tech) : ?>
            <dd><?= $tech ?></dd>
          <?php endforeach ?>
        </div>
      <?php endif ?>
      <?php if (!$page->tools()->isEmpty()) : ?>
        <div>
          <dt>Used tools</dt>
          <?php foreach ($page->tools()->split() as $tool) : ?>
            <dd><?= $tool ?></dd>
          <?php endforeach ?>
        </div>
      <?php endif ?>
      <div>
        <dt>Time Frame</dt>
        <?php if ($page->endDate()->isEmpty()) : ?>
          <dd>Since <?= $page->startDate()->toDate('M Y') ?></dd>
        <?php else : ?>
          <?php
          $start = $page->startDate()->toDate('M Y');
          $end = $page->endDate()->toDate('M Y');

          if ($start == $end) : ?>
            <dd><?= $start ?></dd>
          <?php else : ?>
            <dd><?= $start ?>&ndash;<?= $end ?></dd>
          <?php endif ?>
        <?php endif ?>
      </div>
      <div>
        <dt>Project Type</dt>
        <?php foreach ($page->projectType()->split() as $projectType) : ?>
          <dd><?= $projectType ?></dd>
        <?php endforeach ?>
      </div>
      <?php
      $teamMembers = $page->teamMembers()->toStructure();
      if (!$teamMembers->isEmpty()) : ?>
        <div>
          <dt>Team Members</dt>
          <?php foreach ($teamMembers as $teamMember) : ?>
            <dd><?= $teamMember->name()->smartypants() ?></dd>
          <?php endforeach ?>
        </div>
      <?php endif ?>
      <?php
      $links = $page->links()->toStructure();
      if (!$links->isEmpty()) : ?>
        <div>
          <dt>Links</dt>
          <?php foreach ($links as $link) : ?>
            <dd><a href="<?= $link->url()->html() ?>"><?= $link->name()->smartypants() ?></a></dd>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </dl>
    <a class="back" href="<?= $page->parent()->url() ?>">Back to all projects</a>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
