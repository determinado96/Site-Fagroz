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
  wp_localize_script('main-university-js', 'universityData', array(
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
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'rewrite' => array('slug' => 'agronomy-highlights'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Destaques do curso de Agronomia',
      'add_new_item' => 'Adicionar novo destaque do curso de Agronomia',
      'edit_item' => 'Editar destaque do curso de Agronomia',
      'all_items' => 'Todos os destaques do curso de Agronomia',
      'singular_name' => 'Destaque do curso de Agronomia',
    ),
  ));
}

add_action('init', 'university_post_types');

require_once get_theme_file_path('/inc/helpers/category-label.php');
require_once get_theme_file_path('/inc/queries/news-query.php');
require_once get_theme_file_path('/inc/queries/home-query.php');
require_once get_theme_file_path('/inc/queries/single-post-query.php');

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
