<section id="destaques" class="course-highlights">
  <h2>Destaques do Curso</h2>

  <div class="course-highlights__list">

    <?php
    $highlights = new WP_Query([
      'post_type'      => 'agronomy-highlight',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'menu_order',
      'order'          => 'ASC'
    ]);

    if ($highlights->have_posts()) :
      while ($highlights->have_posts()) :
        $highlights->the_post();
    ?>

        <a href="<?php the_permalink(); ?>" class="highlight-card__link" aria-label="Ver detalhes de <?php the_title_attribute(); ?>">
          <article class="highlight-card">

            <div class="highlight-card__media">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
              <?php endif; ?>
            </div>

            <div class="highlight-card__content">
              <p><?php the_excerpt(); ?></p>
            </div>

          </article>
        </a>

    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>

  </div>
</section>