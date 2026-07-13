<?php

/**
 * Post individual
 * Exibe um post individual de qualquer tipo que não tenha template específico.
 */

get_header();
while (have_posts()) :
  the_post();
  $acf_heroImage = get_field('hero_image');
  $title = $acf_heroImage['title'] ?? '';
  $bg_photo = $acf_heroImage['bg_photo'] ?? '';

  if (is_array($bg_photo)) {
    $bg_photo = $bg_photo['url'] ?? '';
  }

  if (!empty($title) && !empty($bg_photo)) {
    get_template_part(
      'template-parts/components/hero/hero-image',
      null,
      [
        'title' => $title,
        'image' => $bg_photo,
      ]
    );
  }

  $category_meta = fagroz_get_post_category_meta(get_the_ID(), 'sem-categoria');
  $tags = get_the_tags();
  $tag_ids = !empty($tags) ? wp_list_pluck($tags, 'term_id') : [];
  $related_posts = fagroz_get_related_posts(get_the_ID(), $tag_ids);
?>
  <div class="container container--single page-section">
    <div class="single-article">
      <main class="single-article__main">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p>
            <a
              class="metabox__blog-home-link"
              href="<?php echo esc_url(home_url('/')); ?>"
              aria-label="Voltar para a página inicial">
              <span class="dashicons dashicons-admin-home"></span>
            </a>
            <span class="dashicons dashicons-arrow-right-alt2"></span>
            <span class="metabox__main">
              <?php
              $posts_page_id = get_option('page_for_posts');
              if ($posts_page_id) :
              ?>
                <a href="<?php echo esc_url(get_permalink($posts_page_id)); ?>">
                  <?php echo esc_html(get_the_title($posts_page_id)); ?>
                </a>
                <span class="dashicons dashicons-arrow-right-alt2"></span>
              <?php endif; ?>
              Matéria do dia
              <?php echo esc_html(get_the_date('d/m/Y')); ?>
              às
              <?php echo esc_html(get_the_time('H:i')); ?>
            </span>
          </p>
        </div>
        <span class="preview-card__label <?php echo esc_attr($category_meta['class'] ?? ''); ?>">
          <?php echo esc_html($category_meta['text']); ?>
        </span>
        <div class="generic-content">
          <?php the_title(); ?>
          <?php the_content(); ?>
        </div>
        <?php
        if ($tags) :
        ?>
          <div class="post-taglines">
            <p class="post-taglines__title">Taglines:</p>
            <div class="post-taglines__list">
              <?php foreach ($tags as $tag) : ?>
                <span
                  class="post-taglines__item"
                  aria-label="Tagline: <?php echo esc_attr($tag->name); ?>">
                  <?php echo esc_html($tag->name); ?>
                </span>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </main>
      <aside class="single-article__sidebar">
        <?php
        get_template_part('template-parts/components/related-posts', null, [
          'title' => 'Leia também',
          'posts' => $related_posts,
        ]);
        ?>
      </aside>
    </div>
  </div>
<?php
endwhile;
get_footer();
