<?php
$acfCourseHighlights = get_field('course_highlights');
$title = $acfCourseHighlights['title'] ?? get_the_title();
$highlights = fagroz_get_agronomy_highlights();
?>
<section id="destaques" class="course-highlights">
  <h2><?php echo esc_html($title); ?></h2>
  <div class="course-highlights__list">
    <?php foreach ($highlights as $highlight) : ?>
      <a
        href="<?php echo esc_url($highlight['permalink']); ?>"
        class="highlight-card__link"
        aria-label="Ver detalhes de <?php echo esc_attr($highlight['title']); ?>">
        <article class="highlight-card">
          <div class="highlight-card__media">
            <img
              src="<?php echo esc_url($highlight['thumbnail']); ?>"
              alt="<?php echo esc_attr($highlight['title']); ?>">
          </div>
          <div class="highlight-card__content">
            <p>
              <?php echo wp_kses_post($highlight['excerpt']); ?>
            </p>
          </div>
        </article>
      </a>
    <?php endforeach; ?>
  </div>
</section>