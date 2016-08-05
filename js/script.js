jQuery(document).ready(function() {
  var learnables = jQuery(".ofn-learnables").isotope({
    isFitWidth: true,
    hiddenStyle:  { opacity: 0 },
    visibleStyle: { opacity: 1 },
    transitionDuration: '0.6s'
  });

  jQuery("ul.ofn-learnables-filter li a").click(function(e) {
    e.preventDefault();
    jQuery(this).parent().toggleClass("active");

    var filter = jQuery(this).parent().parent();
    refresh_filter(filter);
  });

  // On page load, apply tag filter
  refresh_filter(jQuery(".ofn-learnables"));


  function refresh_filter(filter) {
    var tags = active_tags(filter);
    update_tag_visibility(tags);
  }

  function active_tags(filter) {
    var lis = filter.find("li.active");
    var active_tags = "";

    for(var i=0; i < lis.length; i++) {
      var tag = jQuery(lis[i]).find("a").data('tag');

      active_tags += ".tag-"+tag;
    }

    return active_tags;
  }

  function update_tag_visibility(tags) {
    // When no filters selected, show featured learnables
    if(tags.length == 0) {
      tags = ".tag-featured";
    }

    jQuery(".ofn-learnables").isotope({filter: tags})
  }
});
