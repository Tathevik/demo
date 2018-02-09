$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });



    $(document).on("click", ".sort", function() {
        var columnName = $(this).attr('id');
        var route = '/articles';
        var sort = $(this).attr('sort') == 'desc'?'asc':'desc';
        var _token = $('meta[name="_token"]').attr('content');

        $.ajax({
                type: 'get',
                url: route,
                data: {column_name: columnName, sort: sort, token: _token},
                success: function (response) {
                    $('table').html(response);
                },
                error: function (error) {
                    console.log(error, 'error');
                    return error;
                },
        });
    });
});
