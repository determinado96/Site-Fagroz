<?php
$acfInternalNavigation = get_field('internal_navigation');
$link_1 = $acfInternalNavigation['title_link_1'];
$link_2 = $acfInternalNavigation['title_link_2'];
$link_3 = $acfInternalNavigation['title_link_3'];
$link_4 = $acfInternalNavigation['title_link_4'];
?>
<aside class="page-zootecnia__sidebar">
  <nav class="page-zootecnia__nav" aria-label="Nesta Página">
    <ul>
      <li>
        <a href="#sobre">
          <?= esc_html($link_1); ?>
        </a>
      </li>
      <li>
        <a href="#destaques">
          <?= esc_html($link_2); ?>
        </a>
      </li>
      <li>
        <a href="#estagios">
          <?= esc_html($link_3); ?>
        </a>
      </li>
      <li>
        <a href="#contato">
          <?= esc_html($link_4); ?>
        </a>
      </li>
    </ul>
  </nav>
</aside>