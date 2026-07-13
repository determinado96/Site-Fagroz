<?php
$title = $args['title'];
$image = $args['image'];
$text_position = $args['text_position'] ?? 'bottom-left';
?>

<section class="hero-image">
  <div class="hero-image__media">
    <img
      class="hero-image__image"
      src="<?php echo esc_url($image); ?>"
      alt="<?php echo esc_attr($title); ?>">

    <div class="hero-image__overlay"></div>

    <div class="hero-image__content hero-image__content--<?php echo esc_attr($text_position); ?>">
      <div class="container">
        <?php if (!empty($title)) : ?>
          <h2 class="hero-image__title">
            <?php echo esc_html($title); ?>
          </h2>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>