<?php
$acfIntroductionSection = get_field('introduction_section');
$title = $acfIntroductionSection['title'] ?: get_the_title();
$introduction = $acfIntroductionSection['introduction'] ?: get_the_title();
$graduateProfile = $acfIntroductionSection['graduate_profile'] ?: get_the_title();
$curriculum = $acfIntroductionSection['curriculum'] ?? null;
if (is_array($curriculum)) {
  $curriculum = $curriculum['url'] ?? '';
}
?>
<header id="sobre" class="page-zootecnia__intro">
  <h1><?php echo esc_html($title); ?></h1>
  <p>
    <?php echo wp_kses_post($introduction); ?>
  </p>
  <p>
    <a href="<?php echo esc_url($curriculum); ?>" class="btn-educacao" target="_blank">Currículo do Curso</a>
  </p>
  <p>
    <?php echo wp_kses_post($graduateProfile); ?>
  </p>
</header>