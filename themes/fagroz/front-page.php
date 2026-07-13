<!--
  Página inicial do site
  Sempre que acessa a página inicial (/) e esse arquivo existe
-->
<?php get_header(); ?>

<?php
$acf_slider = get_field('slider');
$slides = [
  [
    'img' => $acf_slider['image_1'],
    'title' => $acf_slider['title_1'],
  ],
  [
    'img' => $acf_slider['image_2'],
    'title' => $acf_slider['title_2'],
  ],
  [
    'img' => $acf_slider['image_3'],
    'title' => $acf_slider['title_3'],
  ],
];

get_template_part(
  'template-parts/components/hero/hero-slider',
  null,
  ['slides' => $slides]
);
?>

<?php
$acf_search = get_field('search');
$title =
  !empty($acf_search['title'])
  ? $acf_search['title']
  : 'O que você procura?';
$placeholder =
  !empty($acf_search['placeholder'])
  ? $acf_search['placeholder']
  : 'Escreva aqui para encontrar o que procura';

get_template_part('template-parts/pages/home/sections/search', null, [
  'title' => $title,
  'placeholder' => $placeholder
]); ?>

<?php
$acf_news = get_field('news');
$title =
  !empty($acf_news['title'])
  ? $acf_news['title']
  : 'Fique por dentro das Notícias:';
$query_news = fagroz_get_home_news() ?? [];

get_template_part('template-parts/pages/home/sections/news', null, [
  'title' => $title,
  'query_news' => $query_news
]);
?>

<?php
$callForOpportunities = get_field('call_for_opportunities');
$title =
  !empty($callForOpportunities['title'])
  ? $callForOpportunities['title']
  : 'Uma grande faculdade, para grandes oportunidades';
$description =
  !empty($callForOpportunities['description'])
  ? $callForOpportunities['description']
  : 'Tem como missão formar e qualificar pessoas comprometidas com a excelência e a ética em suas atividades profissionais; desenvolver e difundir novos conhecimentos em todas as suas áreas de atuação, mediante atividades de pesquisa e extensão, e contribuir para o desenvolvimento da sociedade, por meio da ampla interação com os setores público e privado.';
$button_title =
  !empty($callForOpportunities['button_title'])
  ? $callForOpportunities['button_title']
  : 'Oportunidades de Ensino';

get_template_part(
  'template-parts/pages/home/sections/great-college-opportunities',
  null,
  [
    'title' => $title,
    'description' => $description,
    'button_title' => $button_title,
  ]
);
?>

<?php
$library = get_field('library');
$title = $library['title'] ?? 'Conheça a nossa biblioteca!';
$bg_photo = $library['bg_photo'] ?? null;

if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_template_directory_uri() . '/images/Página - Home/Biblioteca/ThiagoCruz-9152.jpg';
}

$button_title = $library['button_title'] ?? 'Acervo oline';

get_template_part(
  'template-parts/pages/home/sections/library',
  null,
  [
    'title' => $title,
    'bg_photo' => $bg_photo,
    'button_title' => $button_title,
  ]
);
?>

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

<?php
get_template_part('template-parts/pages/home/sections/where-we-are');
?>

<?php get_footer();

?>