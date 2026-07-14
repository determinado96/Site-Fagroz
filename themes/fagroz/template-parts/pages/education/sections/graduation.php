<?php
$acf_graduation = get_field('graduation');

$graduation_title = $acf_graduation['title']  ?? 'Graduação';
$graduation_description = $acf_graduation['description']  ?? 'A FAGRO/UFRGS oferece cursos de graduação voltados às áreas de Agronomia e Zootecnia, combinando formação científica, prática e inovação para preparar profissionais para os desafios do setor agropecuário e ambiental.';
$graduation_bg_photo = $acf_graduation['bg_photo'] ?? null;
$graduation_button_title = $acf_graduation['button_title'] ?? 'Ver mais';

if (is_array($graduation_bg_photo)) {
  $graduation_bg_photo = $graduation_bg_photo['url'] ?? '';
}
if (empty($graduation_bg_photo)) {
  $graduation_bg_photo = get_template_directory_uri() . '/images/Página Educação/default_graduation_image.jpg';
}
?>

<section class="educacao-section">
  <div class="container educacao-inner">
    <div class="educacao-row">
      <div class="educacao-text">
        <h2><?php echo esc_html($graduation_title); ?></h2>
        <p><?php echo esc_html($graduation_description); ?></p>
        <a href="<?php echo site_url('/graduacao'); ?>" class="btn-educacao"><?php echo esc_html($graduation_button_title); ?></a>
      </div>
      <div class="educacao-image">
        <img src="<?php echo esc_url($graduation_bg_photo); ?>" alt="Graduação" />
      </div>
    </div>
  </div>
</section>