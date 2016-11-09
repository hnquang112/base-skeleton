/**
 * Created by hnquang on 2016-07-13.
 */
$(document).ready(function () {
    Common.run();
});

var Common = {
    _token: $('meta[name=csrf-token]').attr('content'),

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
                ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']],
                ['mybutton', ['elfinder']]
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

    // setupButtonInFormPages: function() {
    //     var $input = $('#js-input-image'),
    //         $image = $('#js-image-thumbnail-gotten');
    //
    //     function readURL(input) {
    //         if (input.files && input.files[0]) {
    //             var reader = new FileReader();
    //
    //             reader.onload = function (e) {
    //                 $image.attr('src', e.target.result);
    //             }
    //
    //             reader.readAsDataURL(input.files[0]);
    //         }
    //     }
    //
    //     $input.change(function(){
    //         readURL(this);
    //     });
    // },

    setupElFinderDialog: function() {
        var that = this;

        $("#js-open-elfinder").click(function(e) {
            e.preventDefault();
            var $that = $(this);

            that._openElFinderDialog(function (filePath) {
                $('#' + $that.data('image-id')).attr('src', filePath);
                $('#' + $that.data('input-id')).val(filePath);
            })
        });
    },

    _openElFinderDialog: function(callback) {
        var elf = $('<div/>').css('z-index', 999).dialogelfinder({
            customData: {
                _token: Common._token
            },
            getfile: {
                onlyURL: true,
                multiple: false,
                folders: false,
                oncomplete: ''
            },
            url: '/cms/elfinder/connector',  // connector URL
            lang: 'en',
            width: '70%',
            height: 450,
            destroyOnClose: true,
            getFileCallback: function(file, fm) {
                // pass relative url of file to callback function, ex: "/uploads\IMG_20151005_234346.jpg"
                if (callback) callback('/' + file.path)
            },
            commandsOptions: {
                getfile: {
                    oncomplete: 'close',
                    folders: false
                }
            }
        }).dialogelfinder('instance');
    },

    run: function () {
        this.configAjax();
        this.setupWysiwygEditor();
        this.setupDatatable();
        this.setupSelect2();
        this.setupButtonInListPages();
        // this.setupButtonInFormPages();
        this.setupElFinderDialog();
    }
};

// called by summernote's elFinder extension
function elfinderDialog(){
    Common._openElFinderDialog(function (filePath) {
        $('#summernote').summernote('editor.saveRange');

        // Editor loses selected range (e.g after blur)
        $('#summernote').summernote('editor.restoreRange');
        $('#summernote').summernote('editor.focus');
        $('#summernote').summernote('insertImage', filePath);
    })
}
