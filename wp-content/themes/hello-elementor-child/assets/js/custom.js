/**
 * LUXE WEAR - Custom JavaScript
 *
 * @package HelloElementorChild
 */

(function($) {
	'use strict';

	// DOM Ready
	$(document).ready(function() {
		luxeHeader.init();
		luxeSearch.init();
		luxeMobileMenu.init();
		luxeAccountDropdown.init();
		luxeAnimations.init();
	});

	/**
	 * Sticky Header
	 */
	const luxeHeader = {
		init: function() {
			const header = document.getElementById('luxe-header');
			if (!header) return;

			let lastScroll = 0;
			let ticking = false;

			window.addEventListener('scroll', function() {
				lastScroll = window.pageYOffset;
				if (!ticking) {
					window.requestAnimationFrame(function() {
						if (lastScroll > 50) {
							header.classList.add('scrolled');
						} else {
							header.classList.remove('scrolled');
						}
						ticking = false;
					});
					ticking = true;
				}
			});
		}
	};

	/**
	 * Search Overlay
	 */
	const luxeSearch = {
		init: function() {
			const toggle = document.getElementById('luxe-search-toggle');
			const overlay = document.getElementById('luxe-search-overlay');
			const close = document.getElementById('luxe-search-close');
			const input = overlay ? overlay.querySelector('.luxe-search-input') : null;

			if (!toggle || !overlay) return;

			toggle.addEventListener('click', function(e) {
				e.preventDefault();
				overlay.classList.add('active');
				document.body.style.overflow = 'hidden';
				if (input) {
					setTimeout(function() {
						input.focus();
					}, 300);
				}
			});

			if (close) {
				close.addEventListener('click', function() {
					overlay.classList.remove('active');
					document.body.style.overflow = '';
				});
			}

			// Close on escape
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' && overlay.classList.contains('active')) {
					overlay.classList.remove('active');
					document.body.style.overflow = '';
				}
			});

			// Close on overlay click
			overlay.addEventListener('click', function(e) {
				if (e.target === overlay) {
					overlay.classList.remove('active');
					document.body.style.overflow = '';
				}
			});
		}
	};

	/**
	 * Mobile Menu
	 */
	const luxeMobileMenu = {
		overlay: null,

		init: function() {
			const toggle = document.getElementById('luxe-mobile-toggle');
			const menu = document.getElementById('luxe-mobile-menu');
			const close = document.getElementById('luxe-mobile-close');

			if (!toggle || !menu) return;

			// Create overlay
			this.overlay = document.createElement('div');
			this.overlay.className = 'luxe-mobile-overlay';
			this.overlay.id = 'luxe-mobile-overlay';
			document.body.appendChild(this.overlay);

			const self = this;

			toggle.addEventListener('click', function() {
				self.openMenu(menu, toggle);
			});

			if (close) {
				close.addEventListener('click', function() {
					self.closeMenu(menu, toggle);
				});
			}

			this.overlay.addEventListener('click', function() {
				self.closeMenu(menu, toggle);
			});

			// Close on escape
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape' && menu.classList.contains('active')) {
					self.closeMenu(menu, toggle);
				}
			});
		},

		openMenu: function(menu, toggle) {
			menu.classList.add('active');
			toggle.classList.add('active');
			this.overlay.classList.add('active');
			document.body.style.overflow = 'hidden';
		},

		closeMenu: function(menu, toggle) {
			menu.classList.remove('active');
			toggle.classList.remove('active');
			this.overlay.classList.remove('active');
			document.body.style.overflow = '';
		}
	};

	/**
	 * Account Dropdown
	 */
	const luxeAccountDropdown = {
		init: function() {
			const toggle = document.getElementById('luxe-account-toggle');
			const menu = document.getElementById('luxe-account-menu');

			if (!toggle || !menu) return;

			toggle.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				menu.classList.toggle('active');
			});

			// Close on outside click
			document.addEventListener('click', function(e) {
				if (!menu.contains(e.target) && !toggle.contains(e.target)) {
					menu.classList.remove('active');
				}
			});

			// Close on escape
			document.addEventListener('keydown', function(e) {
				if (e.key === 'Escape') {
					menu.classList.remove('active');
				}
			});
		}
	};

	/**
	 * Scroll Animations
	 */
	const luxeAnimations = {
		init: function() {
			// Smooth scroll for anchor links
			$('a[href^="#"]').on('click', function(e) {
				const target = $(this.getAttribute('href'));
				if (target.length) {
					e.preventDefault();
					$('html, body').stop().animate({
						scrollTop: target.offset().top - 80
					}, 600, 'swing');
				}
			});

			// Fade in elements on scroll
			if ('IntersectionObserver' in window) {
				const observer = new IntersectionObserver(function(entries) {
					entries.forEach(function(entry) {
						if (entry.isIntersecting) {
							entry.target.classList.add('lw-visible');
							observer.unobserve(entry.target);
						}
					});
				}, {
					threshold: 0.1,
					rootMargin: '0px 0px -40px 0px'
				});

				// Observe product cards and other elements
				document.querySelectorAll('.products li.product, .lw-dashboard-card, .woocommerce-Address').forEach(function(el) {
					el.classList.add('lw-animate');
					observer.observe(el);
				});
			}
		}
	};

	/**
	 * Add animation styles dynamically
	 */
	const style = document.createElement('style');
	style.textContent = `
		.lw-animate {
			opacity: 0;
			transform: translateY(20px);
			transition: opacity 0.5s ease, transform 0.5s ease;
		}
		.lw-animate.lw-visible {
			opacity: 1;
			transform: translateY(0);
		}
	`;
	document.head.appendChild(style);

})(jQuery);
