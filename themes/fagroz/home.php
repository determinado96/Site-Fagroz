<?php
get_header();

$args = [
  'paged' => max(1, get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1)),
  'order' => isset($_GET['order']) && in_array(strtolower($_GET['order']), ['asc', 'desc'], true) ? strtoupper($_GET['order']) : 'DESC',
  'category' => isset($_GET['category']) ? sanitize_text_field($_GET['category']) : 'all',
  'search' => get_search_query(),
];

$home_data = fagroz_get_home_posts_data($args);
$posts = $home_data['posts'];
$pagination = $home_data['pagination'];
$order = $home_data['order'];
$category = $home_data['category'];
$search = $home_data['search'];

if (!empty($posts)) :
?>
  <section class="home-posts">
    <div class="home-posts__inner container">
      <div class="home-posts__header">
        <p class="home-posts__title">Notícias</p>
        <div class="home-posts__controls">
          <div class="home-posts__filter">
            <label>
              Data
              <select name="order">
                <option value="desc" <?php selected($order, 'DESC'); ?>>Mais recentes</option>
                <option value="asc" <?php selected($order, 'ASC'); ?>>Mais antigos</option>
              </select>
            </label>
          </div>
          <div class="home-posts__filter">
            <label>
              Conteúdo
              <select name="category">
                <option value="all" <?php selected($category, 'all'); ?>>Todos</option>
                <option value="noticia" <?php selected($category, 'noticia'); ?>>Notícia</option>
                <option value="atualizacao" <?php selected($category, 'atualizacao'); ?>>Atualização</option>
              </select>
            </label>
          </div>
          <form class="home-posts__search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Pesquisar..." />
          </form>
        </div>
      </div>

      <div class="home-posts__grid">
        <?php foreach ($posts as $post) : ?>
          <article class="home-posts__card" style="background-image: url('<?php echo esc_url($post['thumbnail']); ?>');">
            <div class="home-posts__card-top">
              <span class="home-posts__label <?php echo esc_attr($post['label_class']); ?>"><?php echo esc_html($post['label_text']); ?></span>
              <span class="home-posts__date-pill"><?php echo esc_html($post['date']); ?></span>
            </div>
            <h2 class="home-posts__card-title"><a href="<?php echo esc_url($post['permalink']); ?>"><?php echo esc_html($post['title']); ?></a></h2>
            <p class="home-posts__card-excerpt"><?php echo esc_html($post['excerpt']); ?></p>
            <a class="home-posts__button" href="<?php echo esc_url($post['permalink']); ?>">Ver mais</a>
          </article>
        <?php endforeach; ?>
      </div>

      <?php if ($pagination) : ?>
        <div class="home-posts__pagination">
          <?php echo $pagination; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>