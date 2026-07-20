<!-- 
  Exibe um post individual de qualquer tipo que não tenha template específico
  Ordem para chegar nesse arquivo:
  single-post.php          ← Post padrão
  single-professor.php     ← CPT professor
  single-curso.php         ← CPT curso
  *single.php               ← Fallback
  singular.php             ← Fallback ainda mais genérico
  index.php                ← Último recurso
-->
<?php
get_header();
while (have_posts()) :
  the_post();
  // Pega a imagem definida como destacada
  // get_the_id, retorna o identificador do conteúdo que está sendo exibido (post, page, cpt, ...)
  $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
  get_template_part(
    'template-parts/components/hero/post-hero-image',
    null,
    [
      'title' => get_the_title(),
      'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
    ]
  );
  // Recupera um array com as categorias associadas a um post
  $categories = get_the_category();
  // Recupera um array com as tags associadas a um post
  $tags = get_the_tags();
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
              $post_type = get_post_type();
              $archive = get_post_type_archive_link($post_type);
              // recupera os dados e configurações de um tipo de post registrado (como posts, páginas ou Custom Post Types)
              // retorna null se o post_type for inválido
              $post_type_object = get_post_type_object($post_type);
              if ($archive && $post_type_object) :
              ?>
                <a href="<?php echo esc_url($archive); ?>">
                  <?php echo esc_html($post_type_object->labels->name ?? 'Todos os Posts'); ?>
                </a>
                <span class="dashicons dashicons-arrow-right-alt2"></span>
              <?php endif; ?>
              <?php echo esc_html(get_the_date('d/m/Y')); ?>
              às
              <?php echo esc_html(get_the_time('H:i')); ?>
            </span>
          </p>
        </div>
        <?php if (!empty($categories)) : ?>
          <span class="preview-card__label">
            <?php echo esc_html($categories[0]->name); ?>
          </span>
        <?php endif; ?>
        <div class="generic-content">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
        <?php if (!empty($tags)) : ?>
          <div class="post-taglines">
            <p class="post-taglines__title">Tags:</p>
            <div class="post-taglines__list">
              <?php foreach ($tags as $tag) : ?>
                <span class="post-taglines__item">
                  <?php echo esc_html($tag->name); ?>
                </span>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </main>
    </div>
  </div>
<?php
endwhile;
get_footer();
