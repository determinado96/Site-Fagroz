<?php
  $title = $args['title'];
  $placeholder = $args['placeholder'];
?>
<section class="section search-hero">
  <div class="container">
    <div class="search-hero__container">
      <h1 class="search-hero__title">
        <?php echo esc_html($title); ?>
      </h1>
      <form class="search-hero__form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <label class="search-hero__label">
          <span class="search-hero__icon dashicons dashicons-search" aria-hidden="true"></span>
          <input
            class="search-hero__input"
            type="search"
            name="search"
            placeholder="<?php echo esc_attr($placeholder); ?>" />
        </label>
      </form>
    </div>
  </div>
</section>