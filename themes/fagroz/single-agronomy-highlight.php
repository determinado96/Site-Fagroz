<!-- 
  Exibe um post do tipo agronomy-highlight
  Ordem para chegar nesse arquivo:
  *single-{post_type}.phps
  single.php
  singular.php
  index.php
-->
<?php
get_header();
while (have_posts()) :
  the_post();
  $acfAgronomyHighlight = get_field('agronomy_highlight') ?: [];
  $title = $acfAgronomyHighlight['title'] ?: get_the_title();
  $bg_photo = $acfAgronomyHighlight['bg_photo'] ?? '';
  if (is_array($bg_photo)) {
    $bg_photo = $bg_photo['url'] ?? '';
  }
  if (empty($bg_photo)) {
    $bg_photo = get_the_post_thumbnail_url(get_the_ID(), 'full');
  }
  get_template_part(
    'template-parts/components/hero/post-hero-image',
    null,
    [
      'title' => $title,
      'image' => $bg_photo,
    ]
  );
  $tags = fagroz_get_agronomy_highlight_tags();
  $tag_ids = !empty($tags) ? wp_list_pluck($tags, 'term_id') : [];
  $related_posts = fagroz_get_agronomy_highlight_related_posts(get_the_ID(), $tag_ids);
?>
  <div class="container container--single page-section highlights-single">
    <div class="single-article single-article--highlight">
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
              $archive = get_post_type_archive_link('agronomy-highlight');
              $post_type_object = get_post_type_object('agronomy-highlight');
              if ($archive && $post_type_object) :
              ?>
                <a href="<?php echo esc_url($archive); ?>">
                  <?php echo esc_html($post_type_object->labels->name ?: 'Todos os destaques'); ?>
                </a>
                <span class="dashicons dashicons-arrow-right-alt2"></span>
              <?php endif; ?>
              <?php echo esc_html(get_the_date('d/m/Y')); ?>
              às
              <?php echo esc_html(get_the_time('H:i')); ?>
            </span>
          </p>
        </div>
        <div class="generic-content highlights-single__content">
          <?php the_title(); ?>
          <?php the_content(); ?>
        </div>
        <?php if ($tags) : ?>
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
          'show_label' => false,
        ]);
        ?>
      </aside>
    </div>
  </div>
<?php
endwhile;
get_footer();
