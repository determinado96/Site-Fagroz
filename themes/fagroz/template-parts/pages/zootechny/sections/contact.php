<?php
$acfContactSection = get_field('contact_section');
$title = $acfContactSection['title'] ?? get_the_title();
$content = $acfContactSection['content'] ?? '';
?>

<section id="contato" class="page-zootecnia__contact">
  <h2><?php echo esc_html($title); ?></h2>
  <div class="page-zootecnia__contact-list">
    <?php echo wp_kses_post($content); ?>
  </div>
</section>