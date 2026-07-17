<?php
$acf_hero_image = get_field('hero_image');
$hero_title =
  !empty($acf_hero_image['title'])
  ? $acf_hero_image['title']
  : 'zootecnia';
$hero_bg_photo = $acf_hero_image['bg_photo'] ?? null;

if (is_array($hero_bg_photo)) {
  $hero_bg_photo = $hero_bg_photo['url'] ?? '';
}
if (empty($hero_bg_photo)) {
  $hero_bg_photo = get_template_directory_uri() . '/images/Página - zootecnia/default_hero_image.png';
}
?>

<?php get_header(); ?>

<?php
get_template_part(
  'template-parts/components/hero/hero-image',
  null,
  [
    'title' => $hero_title,
    'image' => $hero_bg_photo,
    'text_position' => 'center',
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