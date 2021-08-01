class CustomEditorManagement {

    uploadImageFromEditor(blobInfo, callback) {
        let formData = new FormData();
        if (typeof blobInfo.blob === 'function') {
            formData.append('upload', blobInfo.blob(), blobInfo.filename());
        } else {
            formData.append('upload', blobInfo);
        }

        $.ajax({
            type: 'POST',
            data: formData,
            url: RV_MEDIA_URL.media_upload_from_editor,
            processData: false,
            contentType: false,
            cache: false,
            success(res) {
                if (res.uploaded) {
                    callback(res.url);
                }
            }
        });
    }

    initTinyMce(element) {
        tinymce.init({
            menubar: true,
            selector: '#' + element,
            min_height: $('#' + element).prop('rows') * 110,
            resize: 'vertical',
            plugins: 'code autolink advlist visualchars link image media table charmap hr pagebreak nonbreaking hanbiroclip anchor insertdatetime lists textcolor wordcount imagetools  contextmenu  visualblocks',
            extended_valid_elements: 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link image table | alignleft aligncenter alignright alignjustify  | numlist bullist indent  |  visualblocks code',
            convert_urls: false,
            image_caption: true,
            image_advtab: true,
            image_title: true,
            placeholder: '',
            contextmenu: 'link image inserttable | cell row column deletetable',
            images_upload_url: RV_MEDIA_URL.media_upload_from_editor,
            automatic_uploads: true,
            block_unsupported_drop: false,
            file_picker_types: 'file image media',
            images_upload_handler: this.uploadImageFromEditor.bind(this),
            file_picker_callback: callback => {
                let $input = $('<input type="file" accept="image/*" />').click();

                $input.on('change', e => {
                    this.uploadImageFromEditor(e.target.files[0], callback);

                })
            }
        });
    }

    init(element) {
        let current = this;
        if (element.length) {
            $.each(element, (index, item) => {
                current.initTinyMce($(item).prop('id'));
            });
        }
    }
}

$(document).ready(() => {
    let $tinyMce = $('.editor-tinymce');
    if ($tinyMce.length > 0) {
        new CustomEditorManagement().init($tinyMce);
    }

    $('.custom-select-image').on('click', function (event) {
        event.preventDefault();
        $(this).closest('.image-box').find('.image_input').trigger('click');
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $(input).closest('.image-box').find('.preview_image').prop('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.image_input').on('change', function () {
        readURL(this);
    });
});
