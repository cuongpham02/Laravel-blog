    $(document).ready(function () {

    $('.reply-button').on('click', function () {
        $('.reply-box-comment').hide();
        var commentBoxId = $(this).data('comment-box');
        $('#' + commentBoxId).toggle();
    });

    $('.cancel-button').on('click', function () {
        $('.reply-box-comment').hide();
    });
});