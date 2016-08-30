jQuery(document).ready(function() {

	// Drop Down Menu
	jQuery('ul#main-menu').superfish({
		delay: 600,
		animation: {opacity: 'show', height: 'show'},
		speed: 'fast',
		autoArrows: true,
		dropShadows: false
	});

	// Gallery Hover Effect
	jQuery(".gallery-item .gallery-thumbnail .zoom-wrapper").hover(function () {
		jQuery(this).animate({opacity: 1}, 300);
	}, function () {
		jQuery(this).animate({opacity: 0}, 300);
	});

	// PrettyPhoto
	jQuery(document).ready(function () {
		jQuery("a[rel^='prettyPhoto']").prettyPhoto();
	});

	// Mobile Menu

	// Create the dropdown base
	jQuery("<select />").appendTo("#main-menu-wrapper");

	// Create default option "Go to..."
	jQuery("<option />", {
		"selected": "selected",
		"value": "",
		"text": "Đi đến..."
	}).appendTo("#main-menu-wrapper select");

	// Populate dropdown with menu items
	jQuery("#main-menu a").each(function () {
		var el = jQuery(this);
		jQuery("<option />", {
			"value": el.attr("href"),
			"text": el.text()
		}).appendTo("#main-menu-wrapper select");
	});

	// To make dropdown actually work
	jQuery("#main-menu-wrapper select").change(function () {
		window.location = jQuery(this).find("option:selected").val();
	});

	// Quantity Buttons
	jQuery(function () {

		jQuery("form .qty-text").numeric();
		jQuery("form .qty-text").before('<input type="button" class="plusminus minus" id="minus1" value="-">');
		jQuery("form .qty-text").after('<input type="button" class="plusminus plus" id="plus1" value="+">');

		jQuery(".plusminus").click(function () {
			var jQuerybutton = jQuery(this);
			var oldValue = jQuerybutton.parent().find(".qty-text").val();

			if (jQuerybutton.val() == "+") {
				var newVal = parseFloat(oldValue) + 1;
			}

			else {
				if (oldValue > 1) {
					var newVal = parseFloat(oldValue) - 1;
				}

				else {
					var newVal = 1;
				}
			}

			jQuerybutton.parent().find(".qty-text").val(newVal);

		});

	});

	// Disable backspace for quantity buttons
	jQuery(document).keypress(function (e) {
		var elid = jQuery(document.activeElement).is('.qty-text');
		if (e.keyCode === 8 && elid) {
			return false;
		}
	});

	// Accordion
	jQuery(".accordion").accordion({autoHeight: false});

	// Toggle
	jQuery(".toggle > .inner").hide();
	jQuery(".toggle .title").toggle(function () {
		jQuery(this).addClass("active").closest('.toggle').find('.inner').slideDown(200, 'easeOutCirc');
	}, function () {
		jQuery(this).removeClass("active").closest('.toggle').find('.inner').slideUp(200, 'easeOutCirc');
	});

	// Tabs
	jQuery(function () {
		jQuery("#tabs").tabs();
	});
});

jQuery(document).ready(function(e) {
	// Price Slider
	e("input#min_price, input#max_price").hide();
	e(".price_slider, .price_label").show();
	var t = e(".price_slider_amount #min_price").attr("data-min"),
		n = e(".price_slider_amount #max_price").attr("data-max"),
		s = e(".price_slider_amount #min_price").attr("data-step"),
		woocommerce_price_slider_params = {
			"currency_symbol":e(".price_slider_amount #min_price").attr("data-currency"),
			"currency_pos":"left",
			"min_price":e(".price_slider_amount #min_price").val(),
			"max_price":e(".price_slider_amount #max_price").val()};
	current_min_price = parseInt(t);
	current_max_price = parseInt(n);
	woocommerce_price_slider_params.min_price && (current_min_price = parseInt(woocommerce_price_slider_params.min_price));
	woocommerce_price_slider_params.max_price && (current_max_price = parseInt(woocommerce_price_slider_params.max_price));
	e("body").bind("price_slider_create price_slider_slide", function(t, n, r) {
		if (woocommerce_price_slider_params.currency_pos == "left") {
			e(".price_slider_amount span.from").html(woocommerce_price_slider_params.currency_symbol + n);
			e(".price_slider_amount span.to").html(woocommerce_price_slider_params.currency_symbol + r)
		} else if (woocommerce_price_slider_params.currency_pos == "left_space") {
			e(".price_slider_amount span.from").html(woocommerce_price_slider_params.currency_symbol + " " + n);
			e(".price_slider_amount span.to").html(woocommerce_price_slider_params.currency_symbol + " " + r)
		} else if (woocommerce_price_slider_params.currency_pos == "right") {
			e(".price_slider_amount span.from").html(n + woocommerce_price_slider_params.currency_symbol);
			e(".price_slider_amount span.to").html(r + woocommerce_price_slider_params.currency_symbol)
		} else if (woocommerce_price_slider_params.currency_pos == "right_space") {
			e(".price_slider_amount span.from").html(n + " " + woocommerce_price_slider_params.currency_symbol);
			e(".price_slider_amount span.to").html(r + " " + woocommerce_price_slider_params.currency_symbol)
		}
	});
	e(".price_slider").slider({
		range: !0,
		animate: !0,
		min: t,
		max: n,
		step: s,
		values: [current_min_price, current_max_price],
		create: function(t, n) {
			e(".price_slider_amount #min_price").val(current_min_price);
			e(".price_slider_amount #max_price").val(current_max_price);
			e("body").trigger("price_slider_create", [current_min_price, current_max_price])
		},
		slide: function(t, n) {
			e("input#min_price").val(n.values[0]);
			e("input#max_price").val(n.values[1]);
			e("body").trigger("price_slider_slide", [n.values[0], n.values[1]])
		},
		change: function(t, n) {
			e("body").trigger("price_slider_change", [n.values[0], n.values[1]])
		}
	});

	// Product Page
	e("select.orderby").change(function() {
		e(this).closest("form").submit()
	});
	e("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass("buttons_added").append(
		'<input type="button" value="+" class="plus" />').prepend(
		'<input type="button" value="-" class="minus" />');
	e("input.qty:not(.product-quantity input.qty)").each(function() {
		var t = parseInt(e(this).attr("data-min"));
		t && t > 1 && parseInt(e(this).val()) < t && e(this).val(
			t)
	});
	e(".plus").live("click", function() {
		var t = parseInt(e(this).prev(".qty").val());
		if (!t || t == "" || t == "NaN") t = 0;
		$qty = e(this).prev(".qty");
		var n = parseInt($qty.attr("data-max"));
		if (n == "" || n == "NaN") n = "";
		n && (n == t || t > n) ? $qty.val(n) : $qty.val(t + 1);
		$qty.trigger("change")
	});
	e(".minus").live("click", function() {
		var t = parseInt(e(this).next(".qty").val());
		if (!t || t == "" || t == "NaN") t = 0;
		$qty = e(this).next(".qty");
		var n = parseInt($qty.attr("data-min"));
		if (n == "" || n == "NaN") n = 0;
		n && (n == t || t < n) ? $qty.val(n) : t > 0 && $qty.val(
			t - 1);
		$qty.trigger("change")
	});
});

jQuery(document).ready(function(e) {
	e(".woocommerce_tabs .panel").hide();
	e(".woocommerce_tabs ul.tabs li a").click(function() {
		var t = e(this)
			, n = t.closest(".woocommerce_tabs");
		e("ul.tabs li", n).removeClass("active");
		e("div.panel", n).hide();
		e("div" + t.attr("href")).show();
		t.parent().addClass("active");
		return !1
	});
	e(".woocommerce_tabs").each(function() {
		var t = window.location.hash;
		t.toLowerCase().indexOf("comment-") >= 0 ? e("ul.tabs li.reviews_tab a", e(this)).click() : e("ul.tabs li:first a", e(this)).click()
	});
	e("p.stars a").click(function() {
		var t = e(this);
		e("#rating").val(t.text());
		e("p.stars a").removeClass("active");
		t.addClass("active");
		return !1
	});
	e("#review_form #submit").live("click", function() {
		var t = e("#rating").val();
		if (e("#rating").size() > 0 && !t && woocommerce_params.review_rating_required == "yes") {
			alert(woocommerce_params.required_rating_text);
			return !1
		}
	})
});

// Slider
jQuery(window).load(function(){
  jQuery('.slider').flexslider({
    animation: "slide",
	controlNav: false,
	slideshow: slideshow_autoplay,
	slideshowSpeed: slideshow_speed
  });
});

jQuery(window).load(function(){
  jQuery('.slider-single').flexslider({
    animation: "slide",
	controlNav: true,
	directionNav: false,
	slideshow: slideshow_autoplay,
	slideshowSpeed: slideshow_speed
  });
});