<?php
$acfZootechnicsGraduation = get_field('zootechny_graduation');
$title = $acfZootechnicsGraduation['title'] ?? get_the_title();
$description = $acfZootechnicsGraduation['description'] ?? '';
$bg_photo = $acfZootechnicsGraduation['bg_photo'] ?? '';
if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
?>

<section class="graduacao-section">
  <div class="container graduacao-inner">
    <div class="graduacao-row">
      <div class="graduacao-text">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo wp_kses_post($description); ?></p>
        <a href="<?php echo site_url('/agronomia'); ?>" class="btn-graduacao">Ver mais</a>
      </div>
      <div class="graduacao-image">
        <img src="<?php echo esc_url($bg_photo); ?>" alt="Graduação" />
      </div>
    </div>
  </div>
</section>