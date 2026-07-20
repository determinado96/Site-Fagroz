<?php

class Fagroz_Mega_Menu_Walker extends Walker_Nav_Menu
{
  function start_lvl(&$output, $depth = 0, $args = null)
  {
    if ($depth === 0) {
      $output .= "\n<div class=\"mega-menu\">\n<div class=\"mega-menu__inner\">\n<ul class=\"sub-menu\">\n";
    } elseif ($depth === 1) {
      $output .= "\n<ul class=\"sub-menu-column\">\n";
    }
  }

  function end_lvl(&$output, $depth = 0, $args = null)
  {
    if ($depth === 0) {
      $output .= "\n</ul>\n</div>\n</div>\n";
    } elseif ($depth === 1) {
      $output .= "\n</ul>\n";
    }
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    if ($args->walker->has_children) {
      $classes[] = 'menu-item-has-children';
    }
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    $output .= "<li" . $class_names . ">";

    $atts = array();
    $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
    $atts['target'] = ! empty($item->target)     ? $item->target     : '';
    $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
    $atts['href']   = ! empty($item->url)        ? $item->url        : '';
    $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (! empty($value)) {
        $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $title = apply_filters('the_title', $item->title, $item->ID);

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

// End-point personalizado
function universitySearchResults($data)
{
  $mainQuery = new WP_Query(array(
    'post_type' => 'any',
    's' => sanitize_text_field($data['term']),
    'posts_per_page' => -1
  ));

  $results = array();

  while ($mainQuery->have_posts()) {
    $mainQuery->the_post();

    $results[] = array(
      'title' => get_the_title(),
      'link'  => get_permalink(),
      'type'  => get_post_type(),
      'typeLabel' => get_post_type_object(get_post_type())->labels->singular_name,
      'author' => get_the_author()
    );
  }

  wp_reset_postdata();

  return $results;
}

add_action('rest_api_init', function () {
  register_rest_route('university/v1', 'search', array(
    'methods'  => WP_REST_Server::READABLE,
    'callback' => 'universitySearchResults'
  ));
});

function university_custom_rest()
{
  // Tipo de conteúdo que desejamos modificar
  // Nome do campo
  // Callback
  register_rest_field('post', 'authorName', array(
    'get_callback' => function () {
      return get_the_author();
    }
  ));
}

add_action('rest_api_init', 'university_custom_rest');

function load_theme_resources()
{
  wp_enqueue_script('load-fagroz-js', get_theme_file_uri('/build/index.js'), array('jquery', 'swiper-js'), '1.0', true);
  wp_enqueue_style('google-fonts-figtree', 'https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700&display=swap');
  wp_enqueue_style('google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    array(),
    '11.2.10'
  );
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    array(),
    '11.2.10',
    true
  );
  wp_enqueue_style('dashicons');
  wp_enqueue_style('fagroz_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('fagroz_extra_styles', get_theme_file_uri('/build/index.css'));
  wp_localize_script('load-fagroz-js', 'universityData', array(
    'root_url' => get_site_url(),
  ));
}

add_action('wp_enqueue_scripts', 'load_theme_resources');

function university_features()
{
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  add_theme_support('title-tag');
  // Habilita suporte a imagens destacadas (thumbnails) para posts e páginas (imagem de fundo)
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'university_features');

function university_post_types()
{
  // Cria um post type para Destaques do curso de Agronomia
  register_post_type('agronomy-highlight', array(
    // Mostra no retorno do json da api de posts
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'taxonomies' => array('post_tag'),
    'rewrite' => array('slug' => 'agronomy-highlights'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Destaques da Graduação de Agronomia',
      'add_new_item' => 'Adicionar novo destaque do curso de Agronomia',
      'edit_item' => 'Editar destaque do curso de Agronomia',
      'all_items' => 'Todos os destaques do curso de Agronomia',
      'singular_name' => 'Destaque do curso de Agronomia',
    ),
  ));

  // Cria um post type para Destaques do curso de Zootecnia
  register_post_type('zootechny-highlight', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'taxonomies' => array('post_tag'),
    'rewrite' => array('slug' => 'zootechny-highlights'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Destaques da Graduação de Zootecnia',
      'add_new_item' => 'Adicionar novo destaque do curso de Zootecnia',
      'edit_item' => 'Editar destaque do curso de Zootecnia',
      'all_items' => 'Todos os destaques do curso de Zootecnia',
      'singular_name' => 'Destaque do curso de Zootecnia',
    ),
  ));

  // Cria um post type para Destaques do curso de Pós em Agronegócio
  register_post_type('agribusiness-hl', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'taxonomies' => array('post_tag'),
    'rewrite' => array('slug' => 'agribusiness-hl'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Destaques da Pós-Graduação em Agronegócio',
      'add_new_item' => 'Adicionar novo destaque do curso de Agronegócio',
      'edit_item' => 'Editar destaque do curso de Agronegócio',
      'all_items' => 'Todos os destaques do curso de Agronegócio',
      'singular_name' => 'Destaque do curso de Agronegócio',
    ),
  ));
}

add_action('init', 'university_post_types');

require_once get_theme_file_path('/inc/helpers/category-label.php');
require_once get_theme_file_path('/inc/queries/news-query.php');
require_once get_theme_file_path('/inc/queries/home-query.php');
require_once get_theme_file_path('/inc/queries/single-post-query.php');
require_once get_theme_file_path('/inc/queries/agronomy-highlight-query.php');
require_once get_theme_file_path('/inc/queries/agribusiness-hl-query.php');
require_once get_theme_file_path('/inc/queries/zootechny-highlight-query.php');

// Desativa a barra administrativa no front-end
add_filter('show_admin_bar', '__return_false');

// Ativa as opções do WYSIWYG (editor visual)
function fagroz_mce_buttons($buttons)
{
  return array(
    'formatselect',
    'fontselect',
    'fontsizeselect',
    'bold',
    'italic',
    'underline',
    'strikethrough',
    'forecolor',
    'backcolor',
    'bullist',
    'numlist',
    'blockquote',
    'alignleft',
    'aligncenter',
    'alignright',
    'alignjustify',
    'outdent',
    'indent',
    'link',
    'unlink',
    'hr',
    'charmap',
    'removeformat',
    'undo',
    'redo',
    'pastetext',
    'fullscreen',
    'wp_adv',
  );
}
add_filter('mce_buttons', 'fagroz_mce_buttons');


function fagroz_mce_buttons_2($buttons)
{
  return array(
    'styleselect',

    'subscript',
    'superscript',
    'copy',
    'cut',
    'paste',
    'visualblocks',
    'visualchars',
    'searchreplace',
    'nonbreaking',
    'spellchecker',
    'wp_help',
  );
}

add_filter('mce_buttons_2', 'fagroz_mce_buttons_2');

/**
 * Remove páginas das buscas e listagens,
 * mantendo acesso direto via URL.
 */
function fagroz_excluir_pages_das_consultas($query)
{

  // Não executa no painel administrativo
  if (is_admin()) {
    return;
  }

  // Apenas consulta principal
  if (!$query->is_main_query()) {
    return;
  }


  /**
   * Remove páginas da busca
   */
  if ($query->is_search()) {

    $query->set('post_type', [
      'post',
      'agribusiness-hl',
      'zootechny-highlight',
      'agronomy-highlight',
    ]);
  }


  /**
   * Remove páginas dos arquivos
   */
  if ($query->is_archive()) {

    $query->set('post_type', [
      'post',
      'noticia',
      'professor',
      'curso',
      'nucleo'
    ]);
  }


  /**
   * Remove páginas da página de posts
   */
  if ($query->is_home()) {

    $query->set('post_type', [
      'post',
      'noticia',
      'professor',
      'curso',
      'nucleo'
    ]);
  }
}

add_action('pre_get_posts', 'fagroz_excluir_pages_das_consultas');
