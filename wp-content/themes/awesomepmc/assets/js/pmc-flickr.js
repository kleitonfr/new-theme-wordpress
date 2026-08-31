var Prefeitura = Prefeitura || {};

Prefeitura.Flickr = (function() {
        
  function Flickr() {
    
    this.element = null;
    this.apiUrl = 'https://api.flickr.com/services/rest/';
    this.apiKey = 'bb3e6e76958c852cab6659969095658b';
    this.userId = '143010695@N02';
    this.params = { 
      api_key: this.apiKey, 
      user_id: this.userId, 
      page: 1,
      per_page: 3, 
      format: 'json', 
      nojsoncallback: 1
    };

    this.flickrCarousel = $("#flickrCarousel");
  }
  
  Flickr.prototype.initialize = function() {

    this.params.method = 'flickr.photosets.getList';

    // Return photosets
    $.getJSON(this.apiUrl, this.params, getPhotoSets.bind(this));
  }

  function getPhotoSets(response) {

    $.each(response.photosets.photoset, eachPhotosetsPhotoset.bind(this));
  }

  function eachPhotosetsPhotoset(i, photoset) {

    var images = [];

    var photosetURL = `https://www.flickr.com/photos/${ this.userId }/albums/${ photoset.id }`;

    // Add the Carousel Indicators
    this.flickrCarousel
      .children('.carousel-indicators')
      .append(`<li data-target="#flickrCarousel" data-slide-to="${ i }" ${ i === 0 ? 'class="active"' : ''}>`);

    // Add the Carousel Item
    this.flickrCarousel
      .children('.carousel-inner')
      .append(`<div class="carousel-item ${ i === 0 ? 'active' : ''}">
                 <div id="${ photoset.id }" class="tile-wide image-set"></div>
                 <div class="carousel-caption carousel-caption_adjust">
                  <a class="d-flex w-100 text-white" href="${ photosetURL }" target="_blank">
                    <i class="far fa-images"></i>
                    <span class="mx-2 mb-0 ellipsis">
                      Álbum: ${ photoset.title._content }
                    </span>
                    <i class="fas fa-external-link-alt ml-auto"></i>
                  </a>
                 </div>
               </div>`);
    
    // Select the actual element
    this.element = this.flickrCarousel
      .children('.carousel-inner')
      .children('.carousel-item')
      .eq(i)
      .children(`#${ photoset.id }`);

    // Params Setting
    delete this.params.user_id;

    this.params.method = 'flickr.photosets.getPhotos';
    this.params.per_page = 10;
    this.params.photoset_id = photoset.id;

    // Return photoset photos
    $.getJSON(this.apiUrl, this.params, getPhotosetsPhotos(photoset, images).bind(this));

    // Tiles Initialization
    var Tiles = new Prefeitura.Tiles(this.element, images);
    
    Tiles.initialize();
  }

  function getPhotosetsPhotos(photoset, images) {

    return function(response, textStatus, jqXHR) {

      $.each(response.photoset.photo, eachPhotosetPhoto(photoset, images).bind(this));
    };
  }

  function eachPhotosetPhoto(photoset, images) {

    return function(i, photo) {

      // Params Setting
      delete this.params.photoset_id;
      delete this.params.page;
      delete this.params.per_page;

      this.params.method = 'flickr.photos.getSizes';
      this.params.photo_id = photo.id;

      // Return photo sizes
      $.getJSON(this.apiUrl, this.params, getPhotoSizes(photoset, images).bind(this));
    };
  }

  function getPhotoSizes(photoset, images) {

    return function(response, textStatus, jqXHR) {
      
      $.each(response.sizes.size, eachSizesSize(photoset, images).bind(this));
    }
  }

  function eachSizesSize(photoset, images) {

    return function(i, size) {

      if(size.label === 'Large') {

        // Push image attributes to the respective photoset
        images.push({
          src: size.source,
          href: size.source
        });

        // Add Tile Item
        this.flickrCarousel
          .children('.carousel-inner')
          .children('.carousel-item')
          .children(`#${ photoset.id }`)
          .append(`<div class="tile-item" style="background-image: url(&quot;${ size.source }&quot;);">
                     <a href="${ size.source }" data-fancybox="${ photoset.id }" data-thumb="${ size.source }" class="tile-link"></a>
                   </div>`);
      }
    };
  }
  
  return Flickr;
  
}());