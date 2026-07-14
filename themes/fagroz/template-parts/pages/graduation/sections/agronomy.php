<?php
$acf_agronomy = get_field('agronomy');

$title = $acf_agronomy['title']  ?? 'Bacharel em Agronomia';
$description = $acf_agronomy['description']  ?? 'O Curso de Agronomia da UFRGS forma profissionais capacitados para atuar em toda a cadeia produtiva agropecuária, com sólida base científica nas áreas de solos, fitotecnia, fitossanidade, zootecnia e gestão. A formação prepara o aluno para os desafios da agricultura sustentável e do agronegócio.';
$bg_photo = $acf_agronomy['bg_photo'] ?? null;
$button_title = $acf_agronomy['button_title'] ?? 'Ver mais';

if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_template_directory_uri() . '/images/Página - Graduação/default_agronomia_graduacao.png';
}
?>

<section class="graduacao-section">
  <div class="container graduacao-inner">
    <div class="graduacao-row">
      <div class="graduacao-text">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo esc_html($description); ?></p>
        <a href="<?php echo site_url('/agronomia'); ?>" class="btn-graduacao"><?php echo esc_html($button_title); ?></a>
      </div>
      <div class="graduacao-image">
        <img src="<?php echo esc_url($bg_photo); ?>" alt="Graduação" />
      </div>
    </div>
  </div>
</section>