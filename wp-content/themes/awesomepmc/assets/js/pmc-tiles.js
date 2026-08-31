var Prefeitura = Prefeitura || {};

Prefeitura.Tiles = (function() {
  
  function Tiles(element, images) {
    
    this.element = $(element);
    this.animation = null;
    this.interval = null;
    this.images = images;
    this.photosetId = this.element.attr('id');
  }
  
  Tiles.prototype.initialize = function() {
    
    this.animation = (initialization.call(this, true));

    this.element.on("mouseenter", animationFinalize.bind(this));

    this.element.on("mouseleave", animationInitialize.bind(this));

    // Fancybox Initialization
    $().fancybox({
        selector  : `[data-fancybox="${ this.photosetId }"]`,
        loop      : true,
        autoFocus: false,
        backFocus: false,
        trapFocus: false,
        afterLoad : function (instance, current) {

          this.element.on("mouseleave", animationFinalize.bind(this));

          this.animation.call(this, false);

        }.bind(this),
        afterClose: function (instance, current) {

          this.element.on("mouseleave", animationInitialize.bind(this));

          this.animation.call(this, true);

        }.bind(this),
    });
  }

  function initialization(start) {

    if (start) {

      this.interval = setInterval(loadImages.bind(this), 5000);

    } else {

      clearInterval(this.interval);
    }

    return initialization;
  }

  function loadImages() {

    var temp = this.images.slice();

    for (var i = 0; i < this.element.find('.tile-item').length; i++) {

      var rndIndex = random(0, temp.length);
      var tileItem = $(this.element.find('.tile-item').get(i));
      var photoSrc = temp[rndIndex].src;
      var photoHref = temp[rndIndex].href;

      switchImage.call(this, this.photosetId, tileItem, photoSrc, photoHref);

      temp.splice(rndIndex, 1);
    }
  }

  function animationFinalize(event) {
        
    this.animation.call(this, false);
  }

  function animationInitialize(event) {
      
    this.animation.call(this, true);
  }

  function random(from, to) {

    return Math.floor(Math.random() * (to - (from + 1)) + from);
  }

  function switchImage(photosetId, tileItem, photoSrc, photoHref) {

    setTimeout(function() {

      tileItem.fadeOut(500, function() {

        tileItem.css('background-image', `url(${ photoSrc })`);
        tileItem.html(`<a href="${ photoHref }" data-fancybox="${ photosetId }" data-thumb="${ photoSrc }" class="tile-link">`);
        tileItem.fadeIn();

      });
        
    }, random(0, 1000));
  }
  
  return Tiles;
  
}());