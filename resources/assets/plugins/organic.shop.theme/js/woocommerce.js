jQuery(document).ready(function(e) {
    e("select.orderby").change(function() {
        e(this).closest("form").submit()
    });
    e(
        "div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)"
    ).addClass("buttons_added").append(
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
    var t = woocommerce_params.countries.replace(/&quot;/g, '"'),
        n = e.parseJSON(t);
    e("select.country_to_state").change(function() {
        var t = e(this).val(),
            r = e(this).closest("div").find(
                "#billing_state, #shipping_state, #calc_shipping_state"
            ),
            i = r.parent(),
            s = r.attr("name"),
            o = r.attr("id"),
            u = r.val();
        if (n[t]) n[t].length == 0 ? i.fadeOut(200, function() {
            r.parent().find(".chzn-container").remove();
            r.replaceWith(
                '<input type="hidden" class="hidden" name="' +
                s + '" id="' + o + '" value="" />');
            e("body").trigger(
                "country_to_state_changed", [t, e(
                    this).closest("div")])
        }) : i.fadeOut(200, function() {
            var a = "",
                f = n[t];
            for (var l in f) a = a + '<option value="' +
                l + '">' + f[l] + "</option>";
            if (r.is("input")) {
                r.replaceWith('<select name="' + s +
                    '" id="' + o +
                    '" class="state_select"></select>'
                );
                r = e(this).closest("div").find(
                    "#billing_state, #shipping_state, #calc_shipping_state"
                )
            }
            r.html('<option value="">' +
                woocommerce_params.select_state_text +
                "</option>" + a);
            r.val(u);
            e("body").trigger(
                "country_to_state_changed", [t, e(
                    this).closest("div")]);
            i.fadeIn(500)
        });
        else if (r.is("select")) i.fadeOut(200, function() {
            i.find(".chzn-container").remove();
            r.replaceWith(
                '<input type="text" class="input-text" name="' +
                s + '" id="' + o + '" />');
            e("body").trigger(
                "country_to_state_changed", [t, e(
                    this).closest("div")]);
            i.fadeIn(500)
        });
        else if (r.is(".hidden")) {
            i.find(".chzn-container").remove();
            r.replaceWith(
                '<input type="text" class="input-text" name="' +
                s + '" id="' + o + '" />');
            e("body").trigger("country_to_state_changed", [t, e(
                this).closest("div")]);
            i.delay(200).fadeIn(500)
        }
        e("body").delay(200).trigger(
            "country_to_state_changing", [t, e(this).closest(
                "div")])
    })
});