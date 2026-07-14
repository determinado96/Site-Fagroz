<?php
$acf_research = get_field('research');
$research_title = $acf_research['title'] ?? 'Pesquisa na FAGROZ';
$research_description = $acf_research['description'] ?? 'A Faculdade de Agronomia da UFRGS desenvolve uma pesquisa diversificada e de excelência, acompanhadas e fomentadas pela Comissão de Pesquisa (COMPESQ), responsável por avaliar projetos, propor ações e organizar oportunidades de financiamento.';
$research_button_title = $acf_research['button_title'] ?? 'Ver mais';
?>

<section class="research-section">
  <div class="container research-inner">
    <div class="research-row">
      <div class="research-text">
        <h2><?php echo esc_html($research_title); ?></h2>
        <p><?php echo esc_html($research_description); ?></p>
      </div>
      <a href="#" class="btn-educacao"><?php echo esc_html($research_button_title); ?></a>
    </div>
  </div>
</section>