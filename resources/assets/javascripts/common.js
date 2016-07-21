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
        })
    },

    setupWysiwygEditor: function () {
        $('#summernote').summernote({
            minHeight: 300,
            callbacks: {
                onChange: function(contents, $editable) {
                    $('#this').val(contents);
                }
            }
        })
    },

    setupDatatable: function () {
        $('.datatable').DataTable({
            "order": []
        })
    },

    setupSelect2: function () {
        $('.select2').select2({
            placeholder: 'Select or enter new tag',
            tags: true
        })
    },

    setupButtonInListPages: function () {
        // Enable check and uncheck all functionality
        $("#js-checkbox-toggle-check-all").click(function () {
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
        $("#js-button-confirm-delete").click(function () {
            var ids = $.map($('input[type="checkbox"]:checked'), function (c) {
                return c.value
            });

            if (ids.length > 0) {
                $('#js-modal-confirm-delete').modal()
            }
        });

        $('#js-button-delete').click(function () {
            $('#js-form-delete').submit()
        })
    },

    setupButtonInFormPages: function() {
        var $button = $('#js-button-get-image-from-url'),
            $input = $('#js-input-image-url'),
            $image = $('#js-image-thumbnail-gotten'),
            $result = $('#js-p-get-result');

        $input.keyup(function () {
            if ($(this).val() != '') {
                $button.removeAttr('disabled')
            } else {
                $button.attr('disabled', 'disabled')
            }
        });

        $button.click(function () {
            testImage($input.val(), showThumbnail)
        });

        function testImage(url, callback, timeout) {
            timeout = timeout || 5000;
            var timedOut = false, timer;
            var img = new Image();
            img.onerror = img.onabort = function() {
                if (!timedOut) {
                    clearTimeout(timer);
                    callback(url, -1);
                }
            };
            img.onload = function() {
                if (!timedOut) {
                    clearTimeout(timer);
                    callback(url, 1);
                }
            };
            img.src = url;
            timer = setTimeout(function() {
                timedOut = true;
                callback(url, 0);
            }, timeout)
        }
            
        function showThumbnail(url, result) {
            if (result == -1) {
                $result.text('Error');
                $image.hide()
            }
            if (result == 0) {
                $result.text('Time out');
                $image.hide()
            }
            if (result == 1) {
                $result.text('');
                $image.attr('src', url).show()
            }
        }
    },

    run: function () {
        this.configAjax();
        this.setupWysiwygEditor();
        this.setupDatatable();
        this.setupSelect2();
        this.setupButtonInListPages();
        this.setupButtonInFormPages();
    }
};