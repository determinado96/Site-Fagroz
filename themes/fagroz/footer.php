<footer class="site-footer">
  <div class="site-footer__inner container">
    <div class="site-footer__content">
      <div class="site-footer__col-logo">
        <div class="site-footer__logo">
          <h1 class="site-footer__logo-text">
            <a href="<?php echo site_url() ?>">
              <strong>FAGROZ</strong>
              <span class="site-footer__logo-subtitle">Faculdade de Agronomia e Zootecnia</span>
              <span class="site-footer__logo-institution">UFRGS</span>
            </a>
          </h1>
        </div>
      </div>
      <div class="site-footer__col-access">
        <h3 class="site-footer__heading">Acesso rápido</h3>
        <nav class="site-footer__nav">
          <ul>
            <li><a href="<?php echo site_url('/noticias') ?>">Notícias</a></li>
            <li><a href="<?php echo site_url('/docentes') ?>">Docentes</a></li>
            <li><a href="<?php echo site_url('/intranet') ?>">Intranet</a></li>
          </ul>
        </nav>
      </div>
      <div class="site-footer__col-contact">
        <h3 class="site-footer__heading">Contatos</h3>
        <div class="site-footer__contact-info">
          <p class="site-footer__address">
            Av. Bento Gonçalves, 7712 – Agronomia, Porto Alegre – RS, 91540-000
          </p>
          <p class="site-footer__phone">
            <a href="tel:+556133086041">(061) 3308604</a>
          </p>
          <p class="site-footer__about">
            <a href="<?php echo site_url('/quem-somos') ?>">Quem somos?</a>
          </p>
        </div>
      </div>
      <div class="site-footer__col-social">
        <nav class="site-footer__social">
          <ul class="site-footer__social-list">
            <li><a href="#" class="site-footer__social-link site-footer__social-link--youtube" title="YouTube"><i class="fab fa-youtube"></i></a></li>
            <li><a href="#" class="site-footer__social-link site-footer__social-link--facebook" title="Facebook"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#" class="site-footer__social-link site-footer__social-link--instagram" title="Instagram"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="site-footer__bottom">
      <p class="site-footer__copyright">
        Todos os direitos autorais reservados. Hannah Lerm, Leticia Bianchi, Vinicius Torres 2025
      </p>
    </div>
  </div>
</footer>
<div class="search-overlay">
  <div class="search-overlay__top">
    <div class="container">
      <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
      <input type="text" class="search-term" placeholder="Escreva aqui para encontrar o que procura" id="search-term" autocomplete="off">
      <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
    </div>
  </div>
  <div class="container">
    <div id="search-overlay__results"></div>
  </div>
</div>
<?php wp_footer(); ?>
</body>

</html>