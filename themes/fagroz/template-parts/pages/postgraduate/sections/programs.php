<?php
$agribusiness = get_field('agribusiness');
$soil_science = get_field('soil_science');
$phytotechnics = get_field('phytotechnics');
$zootechny = get_field('zootechny');

if (!is_array($programs) || empty($programs)) {
  $programs = [
    [
      'title' => $agribusiness['title'] ?? 'Agronegócio',
      'description' => $agribusiness['description'] ?? 'A formação aborda produção sustentável, tecnologia e gestão, preparando profissionais para os desafios do setor agrícola.',
      'image' => $agribusiness['image'] ?? get_template_directory_uri() . '/images/Página - Pós-Graduação/agronegocio.jpg',
      'shift' => $agribusiness['shift'] ?? 'Shift Integral',
      'duration' => $agribusiness['duration'] ?? '10 Semestres',
      'link' => $agribusiness['link'] ?? site_url('/agronegocio'),
    ],
    [
      'title' => $soil_science['title'] ?? 'Ciência do Solo',
      'description' => $soil_science['description'] ?? 'Foco em solos, fertilidade e conservação, formando especialistas para atuação em pesquisa e produção agrícola.',
      'image' => $soil_science['image'] ?? get_template_directory_uri() . '/images/Página - Pós-Graduação/ciencia-do-solo.jpg',
      'shift' => $soil_science['shift'] ?? 'Turno Integral',
      'duration' => $soil_science['duration'] ?? '10 Semestres',
      'link' => $soil_science['link'] ?? site_url('/ciencia-do-solo'),
    ],
    [
      'title' => $phytotechnics['title'] ?? 'Fitotecnia',
      'description' => $phytotechnics['description'] ?? 'Estudo de plantas cultivadas, nutrição vegetal e sistemas de produção para alimentos, fibras e energia.',
      'image' => $phytotechnics['image'] ?? get_template_directory_uri() . '/images/Página - Pós-Graduação/fitotecnia.jpg',
      'shift' => $phytotechnics['shift'] ?? 'Turno Integral',
      'duration' => $phytotechnics['duration'] ?? '10 Semestres',
      'link' => $phytotechnics['link'] ?? site_url('/fitotecnia'),
    ],
    [
      'title' => $zootechny['title'] ?? 'Zootecnia',
      'description' => $zootechny['description'] ?? 'Especialização em manejo animal, nutrição e bem-estar para produção animal sustentável e eficiente.',
      'image' => $zootechny['image'] ?? get_template_directory_uri() . '/images/Página - Pós-Graduação/zootecnia.jpg',
      'shift' => $zootechny['shift'] ?? 'Turno Integral',
      'duration' => $zootechny['duration'] ?? '10 Semestres',
      'link' => $zootechny['link'] ?? site_url('/zootecnia'),
    ],
  ];
}
?>

<section class="postgraduate-section postgraduate-section--programs">
  <div class="container">
    <div class="postgraduate-programs__grid">
      <?php foreach ($programs as $program) : ?>
        <?php
        $card_title = $program['title'] ?? '';
        $card_description = $program['description'] ?? '';
        $card_image = $program['image'] ?? '';
        if (is_array($card_image)) {
          $card_image = $card_image['url'] ?? '';
        }
        $card_turno = $program['shift'] ?? 'Turno Integral';
        $card_duration = $program['duration'] ?? '10 Semestres';
        $card_link = !empty($program['link']) ? $program['link'] : site_url('/pos-graduacao');
        ?>

        <article class="postgraduate-card">
          <div class="postgraduate-card__image">
            <img src="<?php echo esc_url($card_image); ?>" alt="<?php echo esc_attr($card_title); ?>">
          </div>
          <div class="postgraduate-card__body">
            <div class="postgraduate-card__meta">
              <span class="postgraduate-card__label"><?php echo esc_html($card_turno); ?></span>
              <span class="postgraduate-card__label"><?php echo esc_html($card_duration); ?></span>
            </div>
            <h3 class="postgraduate-card__title"><?php echo esc_html($card_title); ?></h3>
            <p class="postgraduate-card__description"><?php echo esc_html($card_description); ?></p>
            <a href="<?php echo esc_url($card_link); ?>" class="btn-postgraduate">Mais informações</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
