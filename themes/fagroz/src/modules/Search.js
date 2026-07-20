import $ from "jquery";

class Search {
  constructor() {
    this.resultsDiv = $("#search-overlay__results");
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.searchField = $("#search-term");
    this.isOverlayOpen = false;
    this.isSpinnerInvisible = false;
    this.typingTimer;
    this.previousValue;
    this.events();
  }

  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keyup", this.keyPressDispatcher.bind(this));
    this.searchField.on("keyup", this.typingLogic.bind(this));
  }

  typingLogic() {
    if (this.searchField.val() !== this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchField.val()) {
        if (!this.isSpinnerInvisible) {
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerInvisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
      } else {
        this.resultsDiv.html("");
        this.isSpinnerInvisible = false;
      }
    }
    this.previousValue = this.searchField.val();
  }

  getResults() {
    $.getJSON(
      universityData.root_url +
      "/wp-json/university/v1/search?term=" +
      this.searchField.val(),
      (results) => {
        if (!results.length) {
          this.resultsDiv.html("<p>Nenhum resultado encontrado.</p>");
          this.isSpinnerInvisible = false;
          return;
        }

        this.resultsDiv.html(`
        <h2 class="search-overlay__section-title">Resultados</h2>

        <ul class="link-list min-list">
          ${results
            .map(
              item => `
                <li>
                  <a href="${item.link}">
                    ${item.title}
                  </a>
                  - ${item.typeLabel}
                </li>
              `
            )
            .join("")}
        </ul>
      `);

        this.isSpinnerInvisible = false;
      }
    ).fail(() => {
      this.resultsDiv.html("<p>Erro ao pesquisar.</p>");
      this.isSpinnerInvisible = false;
    });
  }


  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    $("body").addClass("body-no-scroll");
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
  }

  keyPressDispatcher(e) {
    if (e.keyCode === 27 && this.isOverlayOpen) {
      // ESC key
      this.closeOverlay();
    }
  }
}

export default Search;
