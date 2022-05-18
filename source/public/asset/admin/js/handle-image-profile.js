// $(document).ready(function() {
//     $("#btn-add-image").click(function(){
//         $('#upload-image').click()
//     });

// });

function readURLProfile(input) {
    console.log(input.files);
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.append-image-profile').html(
                '<img src="'+ e.target.result +'" width="70px" height="60px" class="image-product"/> '
            )
            $('#image-post-profile').remove();
        };
        reader.readAsDataURL(input.files[0]);
    }
}