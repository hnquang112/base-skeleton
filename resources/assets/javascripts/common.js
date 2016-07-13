/**
 * Created by hnquang on 2016-07-13.
 */
$(document).ready(function () {
    Common.run();
});

var Common = {
    configAjax: function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },

    setupButtonInListPages: function () {
        // Enable check and uncheck all functionality
        $(".js-checkbox-toggle-check-all").click(function () {
            var clicks = $(this).data('clicks');

            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").prop("checked", false);
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").prop("checked", true);
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }

            $(this).data("clicks", !clicks)
        });

        // Call modal for confirm multiple delete
        $(".js-button-confirm-delete").click(function () {
            var ids = $.map($('input[type="checkbox"]:checked'), function (c) {
                return c.value
            });

            if (ids.length > 0) {
                $('#js-modal-confirm-delete').modal()
            }
        });

        $('#js-button-delete').click(function () {
            console.log(1)
        });
    },

    run: function () {
        this.configAjax();
        this.setupButtonInListPages();
    }
};