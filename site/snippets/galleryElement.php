<?php if ($file->type() === "video") : ?>
  <video
    controls
    width="<?= $file->width() ?>"
    height="<?= $file->height() ?>"
    >
    <source src="<?= $file->url() ?>" type="<?= $file->mime() ?>">
  </video>
<?php else : ?>
  <picture>
    <!-- <source
      srcset="<?php /* echo $file->thumb(['format' => 'avif'])->url() */ ?>"
      type="image/avif"
    > -->
    <source
      srcset="<?= $file->thumb(['format' => 'webp'])->url() ?>"
      type="image/webp"
      width="<?= $file->width() ?>"
      height="<?= $file->height() ?>"
    >
    <img
      src="<?= $file->url() ?>"
      alt="<?= $file->alt()->html() ?>"
      width="<?= $file->width() ?>"
      height="<?= $file->height() ?>"
    >
  </picture>
<?php endif ?>
