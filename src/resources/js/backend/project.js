$(function () {
    $("#sortable").sortable({
        update: function (event, ui) {
            var order = $("#sortable").sortable("toArray");
            $('#order').val(order);
        },
        create: function (event, ui) {
            var order = $("#sortable").sortable("toArray");
            $('#order').val(order);
        }
    });
    $("#sortable").disableSelection();

});

$('#sortable li').addClass('ui-state-default');

$(".image-tile").on("click", function (evt) {
    if (evt.metaKey || evt.ctrlKey) {
        $(this).toggleClass("marked");
        if ($('.marked').length) {
            $('#delete-images-submit').prop('disabled', false);
            var idList = []
            $('.marked').each(function () {
                idList.push(this.id);
            });
            $('#delete-images-input').val(idList.toString());
        } else {
            $('#delete-images-submit').prop('disabled', true);
        }
    }
});

$(document).ready(function () {
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,                  // set focus to editable area after initializing summernote
        placeholder: 'Add a project description'
    });
});