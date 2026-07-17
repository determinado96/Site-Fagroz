<?php
$contact_section = get_field('contact_section');
if (empty($contact_section)) {
  $contact_section = 'Teste';
}
?>

<section id="contato" class="page-zootecnia__contact">
  <h2>Contato</h2>
  <div class="page-zootecnia__contact-list">
    <?php echo wp_kses_post($contact_section); ?>
  </div>
</section>