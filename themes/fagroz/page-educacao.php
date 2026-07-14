<?php
$acf_hero_image = get_field('hero_image');

$hero_title  = $acf_hero_image['title']  ?? 'Nossas Oportunidades de Educação';
$hero_bg_photo = $acf_hero_image['bg_photo'] ?? null;

if (is_array($hero_bg_photo)) {
  $hero_bg_photo = $hero_bg_photo['url'] ?? '';
}
if (empty($hero_bg_photo)) {
  $hero_bg_photo = get_template_directory_uri() . '/images/Página Educação/default_hero_image.jpg';
}

$acf_research = get_field('research');
$research_title = $acf_research['title'] ?? 'Pesquisa na FAGROZ';
$research_description = $acf_research['description'] ?? 'A Faculdade de Agronomia da UFRGS desenvolve uma pesquisa diversificada e de excelência, acompanhadas e fomentadas pela Comissão de Pesquisa (COMPESQ), responsável por avaliar projetos, propor ações e organizar oportunidades de financiamento.';
$research_button_title = $acf_research['button_title'] ?? 'Ver mais';
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

<?php get_template_part('template-parts/pages/education/sections/graduation'); ?>

<?php
$collegeCampusLife = get_field('college_campus_life');
$title =
  !empty($collegeCampusLife['title'])
  ? $collegeCampusLife['title']
  : 'Vida no Campus';
$description = !empty($collegeCampusLife['description'])
  ? $collegeCampusLife['description']
  : 'Uma experiência acadêmica completa, com atividades de ensino, pesquisa e extensão. Os amplos espaços verdes, laboratórios e áreas experimentais enriquecem a formação prática e tornam o ambiente universitário mais dinâmico e acolhedor.';
$bg_photo = $collegeCampusLife['bg_photo'] ?? null;

if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}

if (empty($bg_photo)) {
  $bg_photo = get_template_directory_uri() . '/images/Página - Home/Vida no Campus/Gisele-Bertinato_fotografia_Facamp_Vestibular-e-site_25-0650-1-1.jpg';
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