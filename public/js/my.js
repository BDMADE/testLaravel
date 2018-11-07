

$(document).ready(function($) {
    $('#img-profile').on("click",function(){
        $('#avartar').trigger( "click" );
    });

    $("#avartar").change(function() {
        readURL(this);
    });

    /*$('#pay-form').on("submit",function(e){
        e.preventDefault();
        e.stopPropagation();
        if($('#agree_term_pay').is(':checked') && $('#amount').attr('min') <= $('#amount').val()){
            $('#pay-form').submit();
        }else{
            $('#error_form').html('please feel a minimum amount of ' + $('#amount').attr('min') + ' and agree to the term ');

        }
    });*/

});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#img-profile').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}