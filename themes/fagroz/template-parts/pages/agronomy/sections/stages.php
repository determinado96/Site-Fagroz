<?php
$acfInternalSection = get_field('internship_section');
$title = $acfInternalSection['title'] ?? get_the_title();
$description = $acfInternalSection['description'] ?? '';
?>
<section id="estagios" class="page-agronomia__stages">
  <h2><?php echo esc_html($title); ?></h2>
  <div class="page-agronomia__stages-content">
    <?php echo wp_kses_post($description); ?>
  </div>
</section>