$(function () {
    $('.btn-delete').on('click', function () {
        let $itemUrl = $(this).data('url');
        $('#deleteForm').attr('action', $itemUrl);
    });

    $('[data-toggle="tooltip"]').tooltip()
})
