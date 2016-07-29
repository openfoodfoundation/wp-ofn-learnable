jQuery(document).ready(function() {
  jQuery(".ofn-learnables").masonry({
    isFitWidth: true
  });

  jQuery("ul.ofn-learnables-filter li a").click(function(e) {
    e.preventDefault();

    jQuery(this).parent().toggleClass("active");
  });
});
