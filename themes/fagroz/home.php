<!-- Exibe os posts principais (Notícias) -->
<?php
get_header();
// Obter os valores dos parâmetros de consulta da URL
// wp_unslash, remove barras extras
$order_value = isset($_GET['order']) ? wp_unslash($_GET['order']) : '';
$category_value = isset($_GET['category']) ? wp_unslash($_GET['category']) : 'all';
$search_value = isset($_GET['search']) ? wp_unslash($_GET['search']) : '';
$args = [
  // Esse trecho descobre qual página da paginação o usuário está acessando
  'paged' => max(1, get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1)),
  // Esse trecho define a ordem dos resultados.
  'order' => isset($order_value) && in_array(strtolower($order_value), ['asc', 'desc'], true) ? strtoupper($order_value) : 'DESC',
  'category' => sanitize_text_field($category_value),
  'search' => sanitize_text_field($search_value),
];
$home_data = fagroz_get_home_posts_data($args);
$posts = $home_data['posts'];
$pagination = $home_data['pagination'];
$order = $home_data['order'];
$category = $home_data['category'];
$search = $home_data['search'];
?>
<?php
$blog_id = get_option('page_for_posts');
$acfHeroImage = get_field('hero_image', $blog_id);
$title = $acfHeroImage['title'] ?? get_the_title($blog_id);
$bg_photo = $acfHeroImage['bg_photo'] ?? '';
if (is_array($bg_photo)) {
  $bg_photo = $bg_photo['url'] ?? '';
}
if (empty($bg_photo)) {
  $bg_photo = get_the_post_thumbnail_url($blog_id, 'full');
}
get_template_part(
  'template-parts/components/hero/post-hero-image',
  null,
  [
    'title' => $title,
    'image' => $bg_photo,
  ]
);
?>
<section class="home-posts">
  <div class="home-posts__inner container">
    <div class="home-posts__header">
      <form
        class="home-posts__controls"
        method="get"
        action="<?php echo esc_url(home_url('/')); ?>">
        <div class="home-posts__filter">
          <label>
            Data
            <select name="order" onchange="this.form.submit()">
              <option value="desc" <?php selected($order, 'DESC'); ?>>
                Mais recentes
              </option>
              <option value="asc" <?php selected($order, 'ASC'); ?>>
                Mais antigos
              </option>
            </select>
          </label>
        </div>
        <div class="home-posts__filter">
          <label>
            Conteúdo
            <select name="category" onchange="this.form.submit()">
              <option value="all" <?php selected($category, 'all'); ?>>
                Todos
              </option>
              <option value="noticia" <?php selected($category, 'noticia'); ?>>
                Notícia
              </option>
              <option value="atualizacao" <?php selected($category, 'atualizacao'); ?>>
                Atualização
              </option>
            </select>
          </label>
        </div>
        <div class="home-posts__search">
          <input
            type="search"
            name="search"
            value="<?php echo esc_attr($search); ?>"
            placeholder="Pesquisar...">
        </div>
        <button type="submit">
          Buscar
        </button>
      </form>
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
<?php get_footer(); ?>