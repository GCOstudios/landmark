(function($) {
  /*====================================
  Adjust header elements
  ======================================*/
  function headerEl() {
    var $topEl = $('#topbar .topbar_social'),
        $rightContainer = $('#kad-banner .kad-header-right');

    $rightContainer.prepend($topEl);
    $('#topbar').remove();
  }

  headerEl();
})( jQuery );