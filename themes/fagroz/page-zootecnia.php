<!--
  Exibe qualquer página estática que não tenha um template especifico
  Ordem para chegar nesse arquivo:
  page-{slug}.php
  *page.php
  singular.php
  index.php
-->
<?php
$acfHeroImage = get_field('hero_image');
$title = $acfHeroImage['title'] ?: get_the_title();
$bg_photo = $acfHeroImage['bg_photo'] ?? '';
if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
?>
<?php get_header(); ?>
<?php
get_template_part(
  'template-parts/components/hero/post-hero-image',
  null,
  [
    'title' => $title,
    'image' => $bg_photo,
  ]
);
?>
<section class="section page-zootecnia">
  <div class="container page-zootecnia__layout">
    <?php get_template_part('template-parts/pages/zootechny/sections/sidebar'); ?>
    <main class="page-zootecnia__main">
      <?php get_template_part('template-parts/pages/zootechny/sections/introduction'); ?>
      <?php get_template_part('template-parts/pages/zootechny/sections/highlights'); ?>
      <?php get_template_part('template-parts/pages/zootechny/sections/stages'); ?>
      <?php get_template_part('template-parts/pages/zootechny/sections/contact'); ?>
    </main>
  </div>
</section>
<?php
?>