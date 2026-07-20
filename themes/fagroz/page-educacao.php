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
$acfFagrozResearch = get_field('fagroz_research');
$researchTitle = $acfFagrozResearch['title'] ?: get_the_title();
$researchDescription = $acfFagrozResearch['description'] ?? '';
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
<?php get_template_part('template-parts/pages/education/sections/graduation'); ?>
<?php
$acfCollegeCampusLife = get_field('college_life');
$title = $acfCollegeCampusLife['title'] ?: get_the_title();
$description = $acfCollegeCampusLife['description'] ?: '';
$bg_photo = $acfCollegeCampusLife['bg_photo'] ?? '';
if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
get_template_part(
  'template-parts/pages/home/sections/college-campus-life',
  null,
  [
    'title' => $title,
    'description' => $description,
    'bg_photo' => $bg_photo,
  ]
);
?>
<?php get_template_part('template-parts/pages/education/sections/postgraduate'); ?>
<?php get_template_part('template-parts/pages/education/sections/research'); ?>
<?php get_footer(); ?>