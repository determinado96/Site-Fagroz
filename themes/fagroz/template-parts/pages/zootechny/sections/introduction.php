<?php
$acf_zootechny_section = get_field('zootechny_section');

$title = $acf_zootechny_section['title'];
$title =
  !empty($acf_zootechny_section['title'])
  ? $acf_zootechny_section['title']
  : 'Zootecnia';

$graduate_profile = $acf_zootechny_section['graduate_profile'] ?? '';
$graduate_profile =
  !empty($acf_zootechny_section['graduate_profile'])
  ? $acf_zootechny_section['graduate_profile']
  : 'Engenheiro(a) Agrônomo(a)';


$introduction = $acf_zootechny_section['introduction'] ?? '';
$introduction =
  !empty($acf_zootechny_section['introduction'])
  ? $acf_zootechny_section['introduction']
  : 'O curso de Zootecnia da UFRGS confere o título de Engenheiro(a) Agrônomo(a) e oferece anualmente 88 vagas. O curso tem duração de 10 semestres (5 anos), carga horária de 257 créditos obrigatórios (4155 horas), 6 créditos complementares (90 horas), 10 eletivos (150 horas), além de 300 horas de Estágio Supervisionado. Os ingressantes no curso a partri de 2022/1, consideram a carga horária de 248 créditos obrigatórios (4080 horas), 6 créditos complementares (90 horas), 5 eletivos (75 horas), 300 horas de Estágio Supervisionado e um Trabalho de Conclusão de curso em Zootecnia I e II, totalizando uma carga horária de 4245 horas. Os dois currículos permancerão concomitantemente até a diplomação de todos os alunos vinculados ao currículo ZOOTECNIA V1.';

$curriculum =
  !empty($acf_zootechny_section['curriculum_structure'])
  ? $acf_zootechny_section['curriculum_structure']
  : 'Zootecnia';
$curriculum = $acf_zootechny_section['bg_photo'] ?? null;

if (is_array($curriculum)) {
  $curriculum = $curriculum['url'] ?? '';
}
if (empty($curriculum)) {
  $curriculum = get_template_directory_uri() . '/documents/PROJETO_PEDAGOGICO_DO_CURSO_DE_ZOOTECNIA_ATUALIZADO.pdf';
}
?>


<header id="sobre" class="page-zootecnia__intro">
  <h1><?php echo esc_html($title); ?></h1>
  <p>
    <?php echo wp_kses_post($introduction); ?>
  </p>
  <p>
    <a href="<?php echo esc_url($curriculum); ?>" class="btn-educacao" target="_blank">Currículo do Curso</a>
  </p>
  <p>
    <?php echo wp_kses_post($graduate_profile); ?>
  </p>
</header>