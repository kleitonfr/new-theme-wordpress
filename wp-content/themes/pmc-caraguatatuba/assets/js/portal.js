(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('[data-pmc-carousel]').forEach(function (carousel) {
			var slides = carousel.querySelectorAll('[data-pmc-slide]');
			var dots = carousel.querySelectorAll('[data-pmc-dot]');
			var current = 0;
			var timer = null;
			if (slides.length < 2) return;

			function show(index) {
				slides[current].hidden = true;
				if (dots[current]) dots[current].setAttribute('aria-selected', 'false');
				current = (index + slides.length) % slides.length;
				slides[current].hidden = false;
				if (dots[current]) dots[current].setAttribute('aria-selected', 'true');
			}

			function stop() { if (timer) window.clearInterval(timer); timer = null; }
			function start() {
				stop();
				if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
					timer = window.setInterval(function () { show(current + 1); }, 6000);
				}
			}

			dots.forEach(function (dot, index) {
				dot.addEventListener('click', function () { show(index); start(); });
			});
			carousel.addEventListener('mouseenter', stop);
			carousel.addEventListener('mouseleave', start);
			carousel.addEventListener('focusin', stop);
			carousel.addEventListener('focusout', start);
			start();
		});
	});
}());
