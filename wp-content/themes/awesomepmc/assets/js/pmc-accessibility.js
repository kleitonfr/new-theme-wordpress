Prefeitura = Prefeitura || {};

Prefeitura.Accessibility = (function() {
	
	function Accessibility() {

		this.html = $('html');

		this.body = $('body');

		this.cookie = new Prefeitura.Cookie();

		this.contrastAdjust = $('#contrastAdjust');

		this.zoom = 1;
	  this.scale = 0.5625;
	  this.zoomClass = '';
	  this.zoomClasses = [];
	  this.index = 0;

	  this.accessibilityToolsButton = $('#accessibilityToolsButton');
	  this.accessibilityIcons = $('#accessibilityIcons');

	  this.increaseZoom = $('#increaseZoom');
	  this.decreaseZoom = $('#decreaseZoom');
  	this.redefineZoom = $('#redefineZoom');

  	this.delay = 1500;

  	this.interval = null;
	}
	
	Accessibility.prototype.initialize = function() {

		if(this.cookie.check('ccontrast'))
	  	addConstrast.call(this);

	  if(this.cookie.check('czoom-plus'))
	  	increaseZoom.call(this);

	  this.accessibilityToolsButton.on('click', onClick.bind(this));
	  this.contrastAdjust.on('click', onContrastAdjust.bind(this));
	  this.increaseZoom.on('click', onIncreaseZoom.bind(this));
	  this.decreaseZoom.on('click', onDecreaseZoom.bind(this));
	  this.redefineZoom.on('click', onRedefineZoom.bind(this));
	}

	// Accessibility Tools Button On Click

  function onClick() {

  	clearInterval(this.interval);

		this.accessibilityToolsButton.tooltip('hide');

    this.accessibilityIcons.toggle('fast');
  }

	// On Contrast Adjust

	function onContrastAdjust() {

		clearInterval(this.interval);

		this.contrastAdjust.tooltip('hide');

		this.contrastAdjust.children('i').toggleClass('fas far');

  	var ck = this.cookie.check('ccontrast');

	  if (ck) {

	  	this.cookie.delete('ccontrast');

	    removeConstrast.call(this);

	  } else {

	    this.cookie.create('ccontrast', 'cookieContrast');

	    addConstrast.call(this);
	  }

	  this.interval = setInterval(closeAccessibilityPanel.bind(this), 5000);
	}

	// Add Contrast

	function addConstrast() {

  	this.body.toggleClass('dark-side');
  }

  // Remove Contrast

  function removeConstrast() {

    this.body.removeClass('dark-side');
  }

  // Initial Zoom Settings

  function initialZoomSettings() {

  	var ck = this.cookie.check('czoom-level');

	  if (ck){

	  	var cookies = JSON.parse(this.cookie.get('czoom-level'));

	  	if (this.index < cookies.length) {

		  	this.zoomClasses = cookies;

	  		this.index = this.zoomClasses.lastIndexOf(JSON.parse(JSON.stringify(this.zoomClasses)).pop());

	  		if (this.index === 0)
	  			this.zoom = 1;

	  		if (this.index === 1)
	  			this.zoom = 1.5625;

	  		if (this.index === 2)
	  			this.zoom = 2.125;

	  		if (this.index === 3)
	  			this.zoom = 2.6875;

	  		if (this.index === 4)
	  			this.zoom = 3.25;
			}

	  	this.cookie.delete('czoom-level');

	  	return false;
	  }
  }

  // On Increase Zoom

  function onIncreaseZoom() {

  	clearInterval(this.interval);

  	this.increaseZoom.tooltip('hide');

  	var ck = this.cookie.check('czoom-plus');

	  if (ck)
	  	this.cookie.delete('czoom-plus');

	  this.cookie.create('czoom-plus', 'cookieZoom');

	  increaseZoom.call(this);

	  scrollTop.call(this);

	  this.interval = setInterval(closeAccessibilityPanel.bind(this), 5000);
  }

  // Increase Zoom

  function increaseZoom() {

  	initialZoomSettings.call(this);

  	this.decreaseZoom.prop('disabled', false);
  	this.redefineZoom.prop('disabled', false);

  	this.zoom = this.zoom + this.scale;

  	var toPrecision = (this.zoom * 100).toPrecision(3);

  	this.zoomClass = `zoom__${toPrecision}`;

  	if (jQuery.inArray(this.zoomClass, this.zoomClasses) === -1)
  		this.zoomClasses.push(this.zoomClass);

  	this.body.addClass(`zoom ${this.zoomClass}`);

  	if (this.index > 0)
		  this.body.removeClass(`${this.zoomClasses[this.index-1]}`);

  	this.index++;

  	if (this.index >= 4)
  		this.increaseZoom.prop('disabled', true);
  	
  	this.cookie.create('czoom-level', JSON.stringify(this.zoomClasses));

  }

  // On Decrease Zoom

  function onDecreaseZoom() {

  	clearInterval(this.interval);

  	this.decreaseZoom.tooltip('hide');

  	decreaseZoom.call(this);

	  scrollTop.call(this);

	  this.interval = setInterval(closeAccessibilityPanel.bind(this), 5000);
	}

	// Decrease Zoom

  function decreaseZoom() {

  	this.increaseZoom.prop('disabled', false);
  	this.redefineZoom.prop('disabled', false);

  	if (this.index >= 2 && this.index <= 4) {

	  	initialZoomSettings.call(this);

	  	this.zoom = this.zoom - this.scale;

	  	var toPrecision = (this.zoom * 100).toPrecision(3);

	  	this.zoomClass = `zoom__${toPrecision}`;

	  	this.body.addClass(`zoom ${this.zoomClass}`);
  	}

  	if (this.index > 0) {
		  
		  this.body.removeClass(`${this.zoomClasses[this.index-1]}`);

		  this.zoomClasses.pop();
		}

  	this.index--;

  	if (this.index <= 0) {

  		this.decreaseZoom.prop('disabled', true);
  		this.redefineZoom.prop('disabled', true);

    	redefineZoom.call(this);
  	}

  	this.cookie.create('czoom-level', JSON.stringify(this.zoomClasses));

  	if (this.index === 0) {

  		this.cookie.delete('czoom-plus');
  		this.cookie.delete('czoom-level');

  		this.zoomClass = '';
  	}
  }

  // On Redefine Zoom

  function onRedefineZoom() {

  	clearInterval(this.interval);

  	this.redefineZoom.tooltip('hide');

  	this.cookie.delete('czoom-plus');
  	this.cookie.delete('czoom-minus');
  	this.cookie.delete('czoom-level');

  	redefineZoom.call(this);

  	scrollTop.call(this);

  	this.interval = setInterval(closeAccessibilityPanel.bind(this), 5000);
  }

  // Redefine Zoom

  function redefineZoom() {

  	this.zoom = 1;
	  this.zoomClasses = [];
	  this.index = 0;

	  this.increaseZoom.prop('disabled', false);
	  this.decreaseZoom.prop('disabled', true);
	  this.redefineZoom.prop('disabled', true);

    this.body.removeClassRegEx(/zoom/i);
  }

  // Scroll Top

  function scrollTop() {

	  if ($(document).scrollTop() === 0)
	  	this.delay = 0;
	  else
	  	this.delay = 1500;

	  this.html.animate({ scrollTop: 0 }, this.delay);
  }

  // Close Accessibility Panel

  function closeAccessibilityPanel() {

	  this.accessibilityIcons.toggle('fast');

	  clearInterval(this.interval);
	}
	
	return Accessibility
	
}());