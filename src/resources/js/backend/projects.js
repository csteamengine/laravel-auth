$('#deleteProjectModal').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    var destination = button.data('destination');
    var title = button.data('title');
    var modal = $(this);
    modal.find('.modal-title').text('Delete ' + title + "?");
    modal.find('#deleteProjectForm').attr("action", destination);

});

$(document).ready(function () {

    var table = $('#projectTable').DataTable({
        rowReorder: true,
        select: true,
        "columnDefs": [
            {
                "targets": [1],
                "visible": false,
                "searchable": false
            }
        ]
    });

    table.on('row-reordered', function (e, diff, edit) {
        var json = '[';
        var length = table.rows().data().length;
        table.rows().data().each(function (element, index) {
            json += '{"project_id": ' + element[1] + ', "order": ' + element[0] + '}';
            if (index !== (length - 1)) {
                json += ",";
            }
        });
        json += ']';

        try {
            var c = $.parseJSON(json);
            var route = $('#orderRoute').val();
            var csrf_token = $('#csrfValue').val();
            $.ajax({
                /* the route pointing to the post function */
                url: route,
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: csrf_token, projects: json},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    var html = '<div class="alert alert-success" role="alert">' +
                        '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '            <span aria-hidden="true">&times;</span>' +
                        '        </button>' +
                        '' + data['message'] +
                        '    </div>';

                    $('#mainContainer').prepend(html);

                    window.setTimeout(function () {
                        $(".alert").fadeTo(500, 0).slideUp(500, function () {
                            $(this).remove();
                        });
                    }, 4000);
                },
                error: function (err) {
                    var html = '<div class="alert alert-danger" role="alert">' +
                        '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '            <span aria-hidden="true">&times;</span>' +
                        '        </button>' +
                        '' + err['responseJSON']['message'] +
                        '    </div>';
                    $('#mainContainer').prepend(html);

                    window.setTimeout(function () {
                        $(".alert").fadeTo(500, 0).slideUp(500, function () {
                            $(this).remove();
                        });
                    }, 4000);
                }
            });
        } catch (err) {
            var html = '<div class="alert alert-danger" role="alert">' +
                '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '            <span aria-hidden="true">&times;</span>' +
                '        </button>' +
                ' Oops! Something went wrong on our end.' +
                '    </div>';
            $('#mainContainer').prepend(html);
        }
    });
});
