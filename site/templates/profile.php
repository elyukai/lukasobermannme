<?php snippet("header") ?>

<div class="title">
  <div class="wrapper">
    <h1><?= $page->title()->smartypants() ?></h1>
  </div>
</div>
<section>
  <div class="wrapper">
    <h2>Education</h2>
    <dl>
      <?php foreach ($page->education()->toStructure() as $education) : ?>
        <?php $blur = $education->gap()->toBool() ?>
        <?php if ($education->endYear()->isEmpty()) : ?>
          <dt <?= $blur ? ' class="blur"' : '' ?>>Since <?= $education->startYear() ?></dt>
        <?php else : ?>
          <dt <?= $blur ? ' class="blur"' : '' ?>><?= $education->startYear() ?>&ndash;<?= $education->endYear() ?></dt>
        <?php endif ?>
        <dd <?= $blur ? ' class="blur"' : '' ?>>
          <p class="summary"><?= $education->summary()->smartypants() ?></p>
          <?php if (!$education->details()->isEmpty()) : ?>
            <?= $education->details()->kirbytext() ?>
          <?php endif ?>
        </dd>
      <?php endforeach ?>
    </dl>
  </div>
</section>
<section>
  <div class="wrapper">
    <h2>Languages</h2>
    <dl>
      <?php foreach ($page->languages()->toStructure() as $language) : ?>
        <dt><?= $language->language()->smartypants() ?></dt>
        <dd><?= $language->quality()->smartypants() ?></dd>
      <?php endforeach ?>
    </dl>
  </div>
</section>
<section>
  <div class="wrapper">
    <h2>Skills</h2>
    <dl class="lists">
      <?php foreach ($page->skills()->toStructure() as $category) : ?>
        <dt><?= $category->category()->smartypants() ?></dt>
        <?php foreach ($category->skills()->toStructure() as $skill) : ?>
          <dd><?= $skill->name()->smartypants() ?></dd>
        <?php endforeach ?>
      <?php endforeach ?>
    </dl>
  </div>
</section>
<section>
  <div class="wrapper">
    <h2>Interests &amp; Hobbies</h2>
    <ul>
      <?php foreach ($page->interestsHobbies()->toStructure() as $interestHobby) : ?>
        <li><?= $interestHobby->name()->kirbytext() ?></li>
      <?php endforeach ?>
    </ul>
  </div>
</section>

<?php snippet("aboutme") ?>

<?php snippet("footer") ?>
