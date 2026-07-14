<?php
$acf_zootechnics = get_field('zootechnics');

$title = $acf_zootechnics['title']  ?? 'Bacharel em Zootecnia';
$description = $acf_zootechnics['description']  ?? 'O Curso de Zootecnia da UFRGS forma profissionais especializados na produção animal sustentável, com base científica nas áreas de nutrição, melhoramento genético, manejo, reprodução e bem-estar animal. A formação prepara o aluno para atuar em sistemas produtivos de interesse zootécnico.';
$bg_photo = $acf_zootechnics['bg_photo'] ?? null;
$button_title = $acf_zootechnics['button_title'] ?? 'Ver mais';

if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_template_directory_uri() . '/images/Página - Graduação/default_zootecnia_graduacao.png';
}
?>

<section class="graduacao-section">
  <div class="container graduacao-inner">
    <div class="graduacao-row">
      <div class="graduacao-image">
        <img src="<?php echo esc_url($bg_photo); ?>" alt="Pós-Graduação" />
      </div>
      <div class="graduacao-text">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo esc_html($description); ?></p>
        <a href="<?php echo site_url('/zootecnia'); ?>" class="btn-graduacao"><?php echo esc_html($button_title); ?></a>
      </div>
    </div>
  </div>
</section>