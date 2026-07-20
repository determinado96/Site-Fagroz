<?php
get_header();
?>
<div class="container container--narrow page-section">
  <header class="search-header">
    <h1 class="search-title">
      Resultados
    </h1>
    <p class="search-query">
      <?php echo esc_html(get_search_query()); ?>
    </p>
    <p class="search-count">
      Aproximadamente
      <?php echo esc_html($wp_query->found_posts); ?>
      resultados
    </p>
  </header>
  <?php if (have_posts()) : ?>
    <div class="search-results">
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('search-result'); ?>>
          <h2 class="search-result__title">
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>
          <div class="search-result__url">
            <?php echo esc_url(home_url()); ?>
            <?php echo wp_make_link_relative(get_permalink()); ?>
          </div>
          <div class="search-result__excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 35); ?>
          </div>
        </article>
      <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p>
      Nenhum resultado encontrado.
    </p>
  <?php endif; ?>
</div>
<?php
get_footer();
?>