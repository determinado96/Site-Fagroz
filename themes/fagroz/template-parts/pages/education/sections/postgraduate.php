<?php
$acfPostGraduate = get_field('postgraduate');
$title = $acfPostGraduate['title'] ?: get_the_title();
$description = $acfPostGraduate['description']  ?? '';
$bg_photo = $acfPostGraduate['bg_photo'] ?? '';
if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
?>
<section class="educacao-section">
  <div class="container educacao-inner">
    <div class="educacao-row">
      <div class="educacao-image">
        <img src="<?php echo esc_url($bg_photo); ?>" alt="Pós-Graduação" />
      </div>
      <div class="educacao-text">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo wp_kses_post($description); ?></p>
        <a href="<?php echo site_url('/pos-graduacao'); ?>" class="btn-educacao">Ver mais</a>
      </div>
    </div>
  </div>
</section>