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
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'elfinder', 'video', 'hr', 'readmore']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
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

        // Publish or unpublish an article
        $("body").on('click', '.js-button-publish-article', function (e) {
            e.preventDefault();
            var url = $(this).data('href'),
                that = $(this);

            that.siblings('.js-button-publish-article').toggleClass('hide');
            that.toggleClass('hide');

            jQuery.ajax({
                url: url,
                dataType: 'json',
                type: 'post',
                success: function (res) {
                    if (res.error == 0) {
                        var type = 'success';

                        that.parents('tr').find('.js-publish-status').text(res.data.value);
                    } else {
                        var type = 'error'
                    }

                    toastr[type](res.message);
                },
                error: function (err) {
                    console.log(err)
                }
            })
        });

        $('#js-button-agree').click(function () {
            $('#js-form-delete').submit()
        })
    },

    setupButtonInFormPages: function() {
        var $input = $('#js-input-image'),
            $image = $('#js-image-thumbnail-gotten');

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $image.attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $input.change(function(){
            readURL(this);
        });
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

function elfinderDialog(){
    var fm = $('<div/>').css('z-index', 999).dialogelfinder({
        url : '/cms/elfinder/connector' + '?_token=' + $('#summernote').data('token'),
        lang : 'en',
        width : '70%',
        height: 450,
        destroyOnClose : true,
        getFileCallback : function(files, fm) {
            $('#summernote').summernote('insertImage',files.url);
        },
        commandsOptions : {
            getfile : {
                oncomplete : 'close',
                folders : false
            }
        }
    }).dialogelfinder('instance');
}
