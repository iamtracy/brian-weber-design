$(document).foundation();
$(document).ready(function() {
  $(document).foundation();

  $('.travers-modal').click(function() {
    var siblingModal = $(this).data('tab-index');
    $('#workModal' + siblingModal).foundation('open');
  });

  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {

      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top - 135
          }, 0950, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
        var bNoScoll = $(this).data('noclick');
        if (!bNoScoll) {
          $('#responsive-menu-button').click();
        }
      }
    });

  $('.reveal-project-items p').each(function(element) {
    $(this).addClass('tag');
  });

  $('.button.video').click(function() {
    $('iframe.embed').load(function() {
      $('#loader').css('display', 'none');
      $('#loader').css('z-index', '-1');
    });
    var src = $(this).data('src');
    var open = $(this).data('open');
    $('#' + open + 'Vid').attr("src", src);
  });

  $(window).on(
    'closed.zf.reveal',
    function() {
      $('#loader').css('display', 'block');
      $('#loader').css('z-index', '-1');
    }
  );

  $(window).on(
    'open.zf.reveal',
    function() {
      $('#loader').css('display', 'block');
      $('#loader').css('z-index', '1');
    }
  );

});