jQuery(document).ready(function(e) {
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
    })
});
