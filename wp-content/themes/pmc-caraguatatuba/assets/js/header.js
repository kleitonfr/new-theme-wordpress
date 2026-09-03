/**
 * Carrossel do hero banner — header+banner (Portal Caraguatatuba).
 * Vanilla JS, sem dependências, degrada bem se JS estiver desligado
 * (o primeiro slide fica visível por padrão via CSS .is-active).
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var carousels = document.querySelectorAll( '[data-caragua-carousel]' );

		carousels.forEach( function ( carousel ) {
			var slides = carousel.querySelectorAll( '.caragua-hero__slide' );
			var dots = carousel.querySelectorAll( '.caragua-hero__dot' );

			if ( slides.length <= 1 ) {
				return;
			}

			var current = 0;
			var intervalMs = 6000;
			var timer = null;

			function goTo( index ) {
				slides[ current ].classList.remove( 'is-active' );
				dots[ current ] && dots[ current ].classList.remove( 'is-active' );
				dots[ current ] && dots[ current ].setAttribute( 'aria-selected', 'false' );

				current = ( index + slides.length ) % slides.length;

				slides[ current ].classList.add( 'is-active' );
				dots[ current ] && dots[ current ].classList.add( 'is-active' );
				dots[ current ] && dots[ current ].setAttribute( 'aria-selected', 'true' );
			}

			function start() {
				stop();
				timer = window.setInterval( function () {
					goTo( current + 1 );
				}, intervalMs );
			}

			function stop() {
				if ( timer ) {
					window.clearInterval( timer );
					timer = null;
				}
			}

			dots.forEach( function ( dot, index ) {
				dot.addEventListener( 'click', function () {
					goTo( index );
					start();
				} );
			} );

			carousel.addEventListener( 'mouseenter', stop );
			carousel.addEventListener( 'mouseleave', start );

			start();
		} );
	} );
} )();
