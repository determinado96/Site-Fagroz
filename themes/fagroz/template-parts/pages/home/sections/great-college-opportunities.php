<?php
$title = $args['title'];
$description = $args['description'];
$button_title = $args['button_title'];
?>

<section class="great-college-opportunities">
  <div class="great-college-opportunities__container">
    <h2 class="great-college-opportunities__heading">
      <?php echo esc_html($title); ?>
    </h2>

    <div class="great-college-opportunities__content">
      <p class="great-college-opportunities__description">
        <?php echo esc_html($description); ?>
      </p>

      <a href="<?php echo site_url('/educacao'); ?>" class="great-college-opportunities__link">
        <span class="great-college-opportunities__link-icon dashicons dashicons-external"></span>
        <span class="great-college-opportunities__link-text">
          <?php echo esc_html($button_title); ?>
        </span>
      </a>
    </div>
  </div>
</section>