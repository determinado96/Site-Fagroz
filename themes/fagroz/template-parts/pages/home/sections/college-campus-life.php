<?php
$title = $args['title'];
$description = $args['description'];
$bg_photo = $args['bg_photo'];
?>

<section class="college-campus-life">
  <?php
  get_template_part(
    'template-parts/components/hero/hero-image',
    null,
    [
      'title' => $title,
      'image' => $bg_photo,
    ]
  );
  ?>
  <div class="college-campus-life__text container">
    <p class="college-campus-life__paragraph"><?php echo esc_html($description); ?></p>
  </div>
</section>