<?php

$acf_internship_section = get_field('internship_section');

$title = $acf_internship_section['title'];
$title =
  !empty($acf_internship_section['title'])
  ? $acf_internship_section['title']
  : 'Estágios';

$description =
  !empty($acf_internship_section['description'])
  ? $acf_internship_section['description']
  : 'Estágios';
?>

<section id="estagios" class="page-ciencia-do-solo__stages">
  <h2><?php echo esc_html($title); ?></h2>
  <div class="page-ciencia-do-solo__stages-content">
    <?php echo wp_kses_post($description); ?>
  </div>

</section>