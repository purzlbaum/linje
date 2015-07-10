var themeFunctions;

function themeFunctions() {
  var self = this;

  this.init = function () {
    self.initFitVids();
    self.owlInit();
  };

  /*
   *
   * Initialize fitVids.js
   *
   * */
  this.initFitVids = function () {
    jQuery('article').fitVids();
  };

  /*
   *
   * Initialize Owl Carousel
   *
   * */
  this.owlInit = function() {
    var owl = jQuery('.gallery');

    owl.owlCarousel({
      animateOut: 'fadeOut',
      items: 1,
      lazyLoad: true,
      nav: true,
      loop: true,
      autoplay: false,
      autoplayHoverPause: true,
      pullDrag: false,
      navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
      ]
    });
  };
}

jQuery(document).ready(function () {
  themeFunctions = new themeFunctions();
  themeFunctions.init();
});
