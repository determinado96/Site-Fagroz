<?php
if (!function_exists('fagroz_get_agronomy_highlights')) {
  function fagroz_get_agronomy_highlights(): array
  {
    $query = new WP_Query([
      'post_type'      => 'agronomy-highlight',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'menu_order',
      'order'          => 'ASC'
    ]);

    $highlights = [];

    while ($query->have_posts()) {
      $query->the_post();

      $id = get_the_ID();

      $highlights[] = [
        'id' => $id,
        'title' => get_the_title(),
        'permalink' => get_permalink(),
        'thumbnail' => get_the_post_thumbnail_url($id, 'large'),
        'excerpt' => get_the_excerpt(),
      ];
    }

    wp_reset_postdata();

    return $highlights;
  }
}

if (!function_exists('fagroz_get_agronomy_highlight_tags')) {
  function fagroz_get_agronomy_highlight_tags(int $post_id = 0): array
  {
    $post_id = $post_id ?: get_the_ID();

    if (empty($post_id)) {
      return [];
    }

    $tags = get_the_terms($post_id, 'post_tag');

    if (is_wp_error($tags) || empty($tags)) {
      return [];
    }

    return array_values($tags);
  }
}

if (!function_exists('fagroz_get_agronomy_highlight_related_posts')) {
  function fagroz_get_agronomy_highlight_related_posts(int $post_id, array $tag_ids = []): array
  {
    $args = [
      'post_type' => 'agronomy-highlight',
      'posts_per_page' => 2,
      'post__not_in' => [$post_id],
      'ignore_sticky_posts' => true,
      'orderby' => 'date',
      'order' => 'DESC',
    ];

    if ($tag_ids) {
      $args['tag__in'] = $tag_ids;
    }

    $query = new WP_Query($args);

    if ($tag_ids && !$query->have_posts()) {
      unset($args['tag__in']);
      $query = new WP_Query($args);
    }

    $posts = [];

    while ($query->have_posts()) {
      $query->the_post();
      $id = get_the_ID();
      $posts[] = [
        'id' => $id,
        'title' => get_the_title(),
        'permalink' => get_permalink(),
        'thumbnail' => get_the_post_thumbnail_url($id, 'large'),
        'date' => get_the_date('j \d\e F'),
        'excerpt' => get_the_excerpt(),
      ];
    }

    wp_reset_postdata();

    return $posts;
  }
}
