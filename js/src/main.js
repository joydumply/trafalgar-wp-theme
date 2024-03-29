jQuery(document).ready(function ($) {
	$('#loadMoreServices').click(function () {
		const $this = $(this);
		const service_items = $('.service_items');
		const offset = $(this).attr('data-offset') || 6;
		$.ajax({
			url: ajax_params.ajaxurl,
			type: 'post',
			data: {
				action: 'load_more_services',
				offset,
			},
			success: function (response) {
				service_items.append(response.items);
				$this.attr('data-offset', response.offset);
				if (response.hide_button) {
					$this.detach();
				}
			},
		});
	});

	const $header = $('.site-header');
	const header_position_top = $header.offset().top;
	const headerHeight = $header.outerHeight();
	const placeholder = $('<div>')
		.css({ height: headerHeight, display: 'none' })
		.insertAfter($header)
		.addClass('header_placeholder');

	$(window).on('scroll', function () {
		let scrollTop = $(this).scrollTop();
		if (scrollTop > header_position_top) {
			$header.addClass('sticky');
			placeholder.show();
		} else {
			$header.removeClass('sticky');
			placeholder.hide();
		}

		const scrollPos = $(document).scrollTop();

		$('section').each(function () {
			const currSection = $(this);
			const sectionId = $(this).attr('id');
			const sectionTop = currSection.offset().top - 102;
			const sectionBottom = sectionTop + currSection.height();

			if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
				$('.main-navigation ul li').removeClass('active');
				$('.main-navigation ul li')
					.find('a[href="#' + sectionId + '"]')
					.parent()
					.addClass('active');
			}
		});
	});

	$('.testimonials_slider').slick({
		dots: true,
		infinite: false,
		prevArrow: '<button type="button" class="slick-prev"></button>',
		nextArrow: '<button type="button" class="slick-next"></button>',
		appendArrows: $('.slider_navs'),
		appendDots: $('.slider_navs'),
	});

	$('.main-navigation ul li a').on('click', function (e) {
		if (this.hash !== '') {
			e.preventDefault();
			const hash = this.hash;
			if ($('.main-navigation').hasClass('open')) {
				$('.hamburger').trigger('click');
			}
			$('html, body').animate(
				{
					scrollTop: $(hash).offset().top,
				},
				800
			);
		}
	});

	$('.hamburger ').click(function () {
		$(this).toggleClass('open');
		$('body').toggleClass('body_overflow');
		$('.main-navigation').toggleClass('open');
	});
});
