// $(document).ready(function () {
//     $("#btn-add-image").click(function () {
//         $('#upload-image').click()
//     });
// });

function readURL(input) {
    console.log(input.files);
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.append-image').html(
                '<img src="' + e.target.result + '" width="70px" height="60px" class="image-product"/> '
            );
            $('#image-post').remove();
        };
        reader.readAsDataURL(input.files[0]);
    }
}