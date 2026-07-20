<!--
  Exibe qualquer página estática que não tenha um template especifico
  Ordem para chegar nesse arquivo:
  page-{slug}.php
  *page.php
  singular.php
  index.php
-->
<?php
get_header();
?>
<main id="main-content" class="site-main">
  <section class="page-default">
    <div class="container">
      <header class="page-header">
        <h1>
          <?php the_title(); ?>
        </h1>
      </header>
      <div class="page-content">
        <?php
        while (have_posts()) :
          the_post();
          the_content();
        endwhile;
        ?>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
