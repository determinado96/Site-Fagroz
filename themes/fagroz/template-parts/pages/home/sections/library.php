<?php
$title = $args['title'];
$bg_photo = $args['bg_photo'];
$button_title = $args['button_title'];
?>

<section class="library-section">
  <div
    class="library-section__bg"
    style="background-image: url('<?php echo esc_url($bg_photo); ?>');">
  </div>
  <div class="library-section__overlay"></div>
  <div class="library-section__container container">
    <div class="library-section__content">
      <h2 class="library-section__title">
        <?php echo esc_html($title); ?>
      </h2>
      <a href="#" class="btn btn--beige library-section__button">
        <span
          class="dashicons dashicons-book-alt library-section__button-icon"
          aria-hidden="true"></span>
        <span>
          <?php echo esc_html($button_title); ?>
        </span>
      </a>
    </div>
  </div>
</section>