<?php

/**
 * Template Part: Post Hero
 *
 * Exibe o Hero utilizando os argumentos recebidos.
 *
 * Args:
 * - title (string): Título do Hero.
 * - image (string): URL da imagem de fundo.
 */

$title = $args['title'] ?? '';
$image = $args['image'] ?? '';
$textPosition = $args['text_position'] ?? 'bottom-left';

if (empty($image)) {
  return;
}

get_template_part(
  'template-parts/components/hero/hero-image',
  null,
  [
    'title' => $title,
    'image' => $image,
    'text_position' => $textPosition,
  ]
);
