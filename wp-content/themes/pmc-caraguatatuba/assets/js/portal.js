/**
 * PMC Caraguatatuba — comportamentos do portal.
 *
 * Escopo atual: apenas o carrossel do hero. O restante do header é HTML e CSS;
 * o menu sobreposto da navegação é responsabilidade do bloco core/navigation.
 *
 * Contrato de marcação (ver patterns/hero.php):
 *   .pmc-hero            raiz
 *   .pmc-hero__slide     slides; o visível tem .is-active
 *   .pmc-hero__dot       controles; data-pmc-dot = índice; o ativo tem .is-active
 */

(function () {
	'use strict';

	var AUTOPLAY_MS = 6000;

	function reducedMotion() {
		return window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	}

	function initHero(hero) {
		var slides = Array.from(hero.querySelectorAll('.pmc-hero__slide'));
		var campaigns = Array.from(hero.querySelectorAll('.pmc-hero__campaign'));
		var dots = Array.from( hero.querySelectorAll( '.pmc-hero__dot' ) );

		if (slides.length < 2) {
			return;
		}

		var current = Math.max(0, slides.findIndex(function (slide) {
			return slide.classList.contains('is-active');
		}));
		var timer = null;

		function show(index) {
			current = (index + slides.length) % slides.length;

			slides.forEach(function (slide, i) {
				slide.classList.toggle('is-active', i === current);
			});

			campaigns.forEach(function (campaign, i) {
				campaign.classList.toggle('is-active', i === current);
			});

			dots.forEach(function (dot, i) {
				var active = i === current;
				dot.classList.toggle('is-active', active);

				if (active) {
					dot.setAttribute('aria-current', 'true');
				} else {
					dot.removeAttribute('aria-current');
				}
			});
		}

		function stop() {
			if (timer) {
				window.clearInterval(timer);
				timer = null;
			}
		}

		function start() {
			stop();

			if (reducedMotion()) {
				return;
			}

			timer = window.setInterval(function () {
				show(current + 1);
			}, AUTOPLAY_MS);
		}

		dots.forEach(function (dot, i) {
			dot.addEventListener('click', function () {
				show(i);
				start();
			});
		});

		hero.addEventListener('mouseenter', stop);
		hero.addEventListener('mouseleave', start);
		hero.addEventListener('focusin', stop);
		hero.addEventListener('focusout', function (event) {
			if (!hero.contains(event.relatedTarget)) {
				start();
			}
		});

		document.addEventListener('visibilitychange', function () {
			if (document.hidden) {
				stop();
			} else {
				start();
			}
		});

		if (window.matchMedia) {
			var query = window.matchMedia('(prefers-reduced-motion: reduce)');
			var onChange = function () {
				if (query.matches) {
					stop();
				} else {
					start();
				}
			};

			if (query.addEventListener) {
				query.addEventListener('change', onChange);
			} else if (query.addListener) {
				query.addListener(onChange);
			}
		}

		show(current);
		start();
	}

	function boot() {
		Array.prototype.forEach.call(document.querySelectorAll('.pmc-hero'), initHero);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
}());
