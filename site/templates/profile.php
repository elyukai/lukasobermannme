<?php

use Kirby\Toolkit\Str;

snippet('layout', slots: true) ?>

<h1><?= $page->title()->html() ?></h1>

<section class="section section--timed">
  <h2><?= t('Work Experience') ?></h2>
  <dl class="section__item-grid">
    <?php foreach ($page->workExperience()->toStructure() as $workExperience) : ?>
    <div class="section-item">
      <dt class="section-item__title"><?= $workExperience->title()->kti() ?></dt>
      <dd class="section-item__list-wrapper">
        <dl class="section-item__list">
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

<section class="section section--timed">
  <h2><?= t('Education') ?></h2>
  <dl class="section__item-grid">
    <?php foreach ($page->education()->toStructure() as $education) : ?>
    <div<?= $education->gap()->toBool() ? ' class="section-item section-item--blurred"' : ' class="section-item"' ?>>
      <dt class="section-item__title"><?= $education->title()->kti() ?></dt>
      <dd class="section-item__list-wrapper">
        <dl class="section-item__list">
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

<section class="section section--rated capabilities">
  <h2><?= t('Capabilities') ?></h2>
  <div class="section__item-grid">
    <section class="section-item">
      <h3 class="section-item__title"><?= t('Languages') ?></h3>
      <dl class="section-item__list">
        <?php foreach ($page->languages()->toStructure() as $language) : ?>
        <div>
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
        </div>
        <?php endforeach ?>
      </dl>
    </section>
    <?php foreach ($page->skills()->toStructure() as $category) : ?>
    <section class="section-item">
      <h3 class="section-item__title"><?= $category->category()->kti() ?></h3>
      <dl class="section-item__list">
      <?php foreach ($category->skills()->toStructure() as $skill) : ?>
        <div>
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
        </div>
      <?php endforeach ?>
      </dl>
    </section>
    <?php endforeach ?>
  </div>
</section>

<section class="section interests-hobbies">
  <h2><?= t('Interests & Hobbies') ?></h2>
  <ul>
  <?php foreach ($page->interestsHobbies()->toStructure() as $interestHobby) : ?>
    <li><?= $interestHobby->name()->kirbytextinline() ?></li>
  <?php endforeach ?>
  </ul>
</section>
