<?php
get_header();

$paged = max(1, get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1));
$order = isset($_GET['order']) && in_array(strtolower($_GET['order']), ['asc', 'desc'], true) ? strtoupper($_GET['order']) : 'DESC';
$search = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : '';

$query_args = [
  'post_type' => 'zootechny-highlight',
  'post_status' => 'publish',
  'posts_per_page' => get_option('posts_per_page'),
  'paged' => $paged,
  'orderby' => 'date',
  'order' => $order,
  's' => $search,
];

$highlights_query = new WP_Query($query_args);
$posts = [];

if ($highlights_query->have_posts()) {
  while ($highlights_query->have_posts()) {
    $highlights_query->the_post();

    $post_id = get_the_ID();
    $category_meta = fagroz_get_post_category_meta($post_id, 'sem-categoria');

    $posts[] = [
      'id' => $post_id,
      'title' => get_the_title($post_id),
      'permalink' => get_permalink($post_id),
      'thumbnail' => get_the_post_thumbnail_url($post_id, 'large') ?: get_template_directory_uri() . '/images/default-thumbnail.jpeg',
      'date' => get_the_date('j \d\e F \d\e Y', $post_id),
      'excerpt' => wp_trim_words(get_the_excerpt($post_id), 24),
      'label_text' => $category_meta['text'],
      'label_class' => $category_meta['class'],
    ];
  }

  wp_reset_postdata();
}

$pagination = paginate_links([
  'total' => $highlights_query->max_num_pages,
  'current' => $paged,
  'type' => 'list',
  'prev_text' => __('&laquo;'),
  'next_text' => __('&raquo;'),
]);
?>

<section class="archive-zootechny-highlights">
  <div class="archive-zootechny-highlights__inner container">
    <div class="archive-zootechny-highlights__header">
      <p class="archive-zootechny-highlights__title">Destaques do curso</p>

      <div class="archive-zootechny-highlights__controls">
        <div class="archive-zootechny-highlights__filter">
          <label>
            Data
            <select name="order" form="archive-zootechny-highlights-form">
              <option value="desc" <?php selected($order, 'DESC'); ?>>Mais recentes</option>
              <option value="asc" <?php selected($order, 'ASC'); ?>>Mais antigos</option>
            </select>
          </label>
        </div>

        <form id="archive-zootechny-highlights-form" class="archive-zootechny-highlights__search" role="search" method="get" action="<?php echo esc_url(get_post_type_archive_link('zootechny-highlight')); ?>">
          <input type="search" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Pesquisar destaque..." />
        </form>
      </div>
    </div>

    <?php if (!empty($posts)) : ?>
      <div class="archive-zootechny-highlights__grid">
        <?php foreach ($posts as $post) : ?>
          <article class="archive-zootechny-highlights__card" style="background-image: url('<?php echo esc_url($post['thumbnail']); ?>');">
            <div class="archive-zootechny-highlights__card-top">
              <span class="archive-zootechny-highlights__label"><?php echo esc_html($post['label_text']); ?></span>
              <span class="archive-zootechny-highlights__date-pill"><?php echo esc_html($post['date']); ?></span>
            </div>
            <h2 class="archive-zootechny-highlights__card-title">
              <a href="<?php echo esc_url($post['permalink']); ?>"><?php echo esc_html($post['title']); ?></a>
            </h2>
            <p class="archive-zootechny-highlights__card-excerpt"><?php echo esc_html($post['excerpt']); ?></p>
            <a class="archive-zootechny-highlights__button" href="<?php echo esc_url($post['permalink']); ?>">Ver mais</a>
          </article>
        <?php endforeach; ?>
      </div>

      <?php if ($pagination) : ?>
        <div class="archive-zootechny-highlights__pagination">
          <?php echo $pagination; ?>
        </div>
      <?php endif; ?>
    <?php else : ?>
      <p class="archive-zootechny-highlights__empty">Nenhum destaque encontrado.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>