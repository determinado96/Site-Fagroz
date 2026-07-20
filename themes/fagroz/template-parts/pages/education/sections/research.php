<?php
$acfResearch = get_field('fagroz_research');
$title = $acfResearch['title'] ?: get_the_title();
$description = $acfResearch['description']  ?? '';
?>

<section class="research-section">
  <div class="container research-inner">
    <div class="research-row">
      <div class="research-text">
        <h2><?php echo esc_html($title); ?></h2>
        <p><?php echo wp_kses_post($description); ?></p>
      </div>
      <a href="#" class="btn-educacao">Ver mais</a>
    </div>
  </div>
</section>