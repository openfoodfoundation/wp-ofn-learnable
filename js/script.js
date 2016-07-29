jQuery(document).ready(function() {
  var learnables = jQuery(".ofn-learnables").masonry({
    isFitWidth: true
  });

  jQuery("ul.ofn-learnables-filter li a").click(function(e) {
    e.preventDefault();
    jQuery(this).parent().toggleClass("active");

    var filter = jQuery(this).parent().parent();
    var tags = active_tags(filter);
    update_tag_visibility(tags);
    learnables.masonry('layout');
  });

  function active_tags(filter) {
    var lis = filter.find("li.active");
    var active_tags = "";

    for(var i=0; i < lis.length; i++) {
      var li = jQuery(lis[i]);
      active_tags += ".tag-"+li.text();
    }

    return active_tags;
  }

  function update_tag_visibility(tags) {
    jQuery(".ofn-learnable").show();
    if(tags.length > 0) {
      jQuery(".ofn-learnable").not(tags).hide();
    }
  }
});
