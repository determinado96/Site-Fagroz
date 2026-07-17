<?php
$acf_hero_image = get_field('hero_image');
$hero_title =
  !empty($acf_hero_image['title'])
  ? $acf_hero_image['title']
  : 'Ciência do Solo';
$hero_bg_photo = $acf_hero_image['bg_photo'] ?? null;

if (is_array($hero_bg_photo)) {
  $hero_bg_photo = $hero_bg_photo['url'] ?? '';
}
if (empty($hero_bg_photo)) {
  $hero_bg_photo = get_template_directory_uri() . '/images/Página - Ciência do Solo/default_hero_image.png';
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

<section class="section page-ciencia-do-solo">
  <div class="container page-ciencia-do-solo__layout">
    <?php get_template_part('template-parts/pages/ciencia-do-solo/sections/sidebar'); ?>

    <main class="page-ciencia-do-solo__main">
      <?php get_template_part('template-parts/pages/ciencia-do-solo/sections/introduction'); ?>

      <?php get_template_part('template-parts/pages/ciencia-do-solo/sections/highlights'); ?>

      <?php get_template_part('template-parts/pages/ciencia-do-solo/sections/stages'); ?>

      <?php get_template_part('template-parts/pages/ciencia-do-solo/sections/contact'); ?>
    </main>
  </div>
</section>

<?php
?>