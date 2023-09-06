<?php

use Kirby\Toolkit\Str;

snippet('layout', slots: true) ?>

<h1 class="aos"><?= $page->title()->html() ?></h1>

<section>
  <h2 class="aos"><?= t('Work Experience') ?></h2>
  <dl>
    <?php foreach ($page->workExperience()->toStructure() as $workExperience) : ?>
    <div class="aos">
      <dt><?= $workExperience->title()->kti() ?></dt>
      <dd>
        <dl>
          <div class="time">
            <dt class="sr-only">Time Period</dt>
            <dd><?php snippet(
              'datespan',
              [
                'startYear' => $workExperience->startYear(),
                'startMonth' => $workExperience->startMonth(),
                'startDay' => $workExperience->startDay(),
                'endYear' => $workExperience->endYear(),
                'endMonth' => $workExperience->endMonth(),
                'endDay' => $workExperience->endDay(),
              ]
            ) ?></dd>
          </div>
          <?php foreach ($workExperience->details()->toStructure() as $detail) : ?>
          <div>
            <dt><?= $detail->label()->kti() ?></dt>
            <?php foreach ($detail->contents()->toStructure() as $content) : ?>
            <dd><?= $content->content()->content()->kti() ?></dd>
            <?php endforeach ?>
          </div>
          <?php endforeach ?>
        </dl>
      </dd>
    </div>
    <?php endforeach ?>
  </dl>
</section>

<section>
  <h2 class="aos"><?= t('Education') ?></h2>
  <dl>
    <?php foreach ($page->education()->toStructure() as $education) : ?>
    <div<?= $education->gap()->toBool() ? ' class="blur aos"' : ' class="aos"' ?>>
      <dt><?= $education->title()->kti() ?></dt>
      <dd>
        <dl>
          <div class="time">
            <dt class="sr-only">Time Period</dt>
            <dd><?php snippet(
              'datespan',
              [
                'startYear' => $education->startYear(),
                'startMonth' => $education->startMonth(),
                'startDay' => $education->startDay(),
                'endYear' => $education->endYear(),
                'endMonth' => $education->endMonth(),
                'endDay' => $education->endDay(),
              ]
            ) ?></dd>
          </div>
          <?php foreach ($education->details()->toStructure() as $detail) : ?>
          <div>
            <dt><?= $detail->label()->kti() ?></dt>
            <?php foreach ($detail->contents()->toStructure() as $content) : ?>
            <dd><?= $content->content()->content()->kti() ?></dd>
            <?php endforeach ?>
          </div>
          <?php endforeach ?>
        </dl>
      </dd>
    </div>
    <?php endforeach ?>
  </dl>
</section>

<section class="capabilities">
  <h2 class="aos"><?= t('Capabilities') ?></h2>
  <div class="subsection-grid">
    <section class="aos">
      <h3><?= t('Languages') ?></h3>
      <dl>
        <?php foreach ($page->languages()->toStructure() as $language) : ?>
        <dt><?= $language->language()->smartypants() ?></dt>
        <dd>
          <?php $isNativeSpeaker = $language->isNativeSpeaker()->toBool() ?>
          <?php $label = $isNativeSpeaker ? t('Native Speaker') : Str::upper($language->quality()) ?>
          <?php $quality = match ($language->quality()->toString()) {
              'a1' => 1,
              'a2' => 2,
              'b1' => 3,
              'b2' => 4,
              'c1' => 5,
              'c2' => 6,
              default => 0,
          } ?>
          <span class="level-description" aria-hidden="true"><?= $label ?></span>
          <div class="level" role="img" aria-label="<?= $label ?>">
            <div<?= e($quality >= 1, ' class="active"') ?>></div>
            <div<?= e($quality >= 2, ' class="active"') ?>></div>
            <div<?= e($quality >= 3, ' class="active"') ?>></div>
            <div<?= e($quality >= 4, ' class="active"') ?>></div>
            <div<?= e($quality >= 5, ' class="active"') ?>></div>
            <div<?= e($quality >= 6, ' class="active"') ?>></div>
          </div>
        </dd>
        <?php endforeach ?>
      </dl>
    </section>
    <?php foreach ($page->skills()->toStructure() as $category) : ?>
    <section class="aos">
      <h3><?= $category->category()->kti() ?></h3>
      <dl>
      <?php foreach ($category->skills()->toStructure() as $skill) : ?>
        <dt><?= $skill->name()->kti() ?></dt>
        <dd>
          <?php $label = match ($skill->proficiency()->toString()) {
              'beginner' => t('Beginner'),
              'intermediate' => t('Intermediate'),
              'proficient' => t('Proficient'),
              'advanced' => t('Advanced'),
              default => '—',
          } ?>
          <?php $proficiency = match ($skill->proficiency()->toString()) {
              'beginner' => 1,
              'intermediate' => 2,
              'proficient' => 3,
              'advanced' => 4,
              default => 0,
          } ?>
          <span class="level-description" aria-hidden="true"><?= $label ?></span>
          <div class="level" role="img" aria-label="<?= $label ?>">
            <div<?= e($proficiency >= 1, ' class="active"') ?>></div>
            <div<?= e($proficiency >= 2, ' class="active"') ?>></div>
            <div<?= e($proficiency >= 3, ' class="active"') ?>></div>
            <div<?= e($proficiency >= 4, ' class="active"') ?>></div>
          </div>
        </dd>
      <?php endforeach ?>
      </dl>
    </section>
    <?php endforeach ?>
  </div>
</section>

<section class="interests-hobbies aos">
  <h2><?= t('Interests & Hobbies') ?></h2>
  <ul class="scaled--small">
  <?php foreach ($page->interestsHobbies()->toStructure() as $interestHobby) : ?>
    <li><?= $interestHobby->name()->kirbytextinline() ?></li>
  <?php endforeach ?>
  </ul>
</section>
