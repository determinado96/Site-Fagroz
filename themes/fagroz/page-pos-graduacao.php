<?php
$acf_hero_image = get_field('hero_image');

$hero_title  = $acf_hero_image['title']  ?? 'Explore nossas opções de Pós-Graduação';
$hero_bg_photo = $acf_hero_image['bg_photo'] ?? null;

if (is_array($hero_bg_photo)) {
  $hero_bg_photo = $hero_bg_photo['url'] ?? '';
}
if (empty($hero_bg_photo)) {
  $hero_bg_photo = get_template_directory_uri() . '/images/Página - Pós-Graduação/default_hero_image.jpg';
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
  ]
);
?>

<?php get_template_part('template-parts/pages/postgraduate/sections/programs'); ?>

<?php get_footer(); ?>
