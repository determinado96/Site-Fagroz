<?php
$acf_postgraduate = get_field('postgraduate');

$postgraduate_title = $acf_postgraduate['title']  ?? 'Pós-Graduação';
$postgraduate_description = $acf_postgraduate['description']  ?? 'A  Faculdade de Agronomia (FAGRO) é uma Unidade Acadêmica da UFRGS, com atuação nas áreas de Ciências Agrárias.  prioritariamente  no estado do Rio Grande do Sul, estabelecendo intercâmbio com outras instituições sediadas no Brasil e no Exterior.';
$postgraduate_bg_photo = $acf_postgraduate['bg_photo'] ?? null;
$postgraduate_button_title = $acf_postgraduate['button_title'] ?? 'Ver mais';

if (is_array($postgraduate_bg_photo)) {
  $postgraduate_bg_photo = $postgraduate_bg_photo['url'] ?? '';
}
if (empty($postgraduate_bg_photo)) {
  $postgraduate_bg_photo = get_template_directory_uri() . '/images/Página Educação/default_postgraduate_image.png';
}
?>

<section class="educacao-section">
  <div class="container educacao-inner">
    <div class="educacao-row">
      <div class="educacao-image">
        <img src="<?php echo esc_url($postgraduate_bg_photo); ?>" alt="Pós-Graduação" />
      </div>
      <div class="educacao-text">
        <h2><?php echo esc_html($postgraduate_title); ?></h2>
        <p><?php echo esc_html($postgraduate_description); ?></p>
        <a href="#" class="btn-educacao"><?php echo esc_html($postgraduate_button_title); ?></a>
      </div>
    </div>
  </div>
</section>