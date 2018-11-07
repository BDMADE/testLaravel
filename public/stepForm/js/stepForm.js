


var currentIndex = 0;
var nbStepForm = 0;
var listStepForm = [];
var list_Step_Form = $('.step-form ul .nav-link');


$( document ).ready(function() {


    window.list_Step_Form.each(function (item) {
        window.listStepForm[window.nbStepForm] = item;
        window.nbStepForm++;
    });

    if(window.nbStepForm > 0)
        $('.step-form .tabs-section-nav .nav-tabs .nav-item').css('width', (100 / window.nbStepForm)+'%');

    $('#next-form').on('click', function () {

        if (window.currentIndex == window.nbStepForm - 1 && validateForm(window.currentIndex)) {
            if(window.user_login) {
                $('#step_form').submit();
            }else{
                $('#error_login1').html("you must login first, before submiting your order ");
                $('#error_login2').html("you must login first, before submiting your order ");
            }

        }

        if(validateForm(window.currentIndex)) {
            for (i = 0; i <= window.currentIndex; i++) {
                $('#tabs-2-tab-' + i).removeClass('active');
                $('#tabs-2-tab-' + i).removeClass('in');
                $('#tabs-2-tab-' + i).prop('aria-expanded', false);
                $('#tabs-1-tab-' + i).parent().removeClass('active');
                $('#tabs-1-tab-' + i).prop('aria-expanded', false);

                $('#tabs-1-tab-' + i).parent().removeClass('active');


            }

            window.currentIndex++;
            window.currentIndex = (window.currentIndex >= window.nbStepForm) ? window.nbStepForm - 1 : window.currentIndex;

            $('#tabs-2-tab-' + (window.currentIndex)).addClass('active');
            $('#tabs-2-tab-' + (window.currentIndex)).addClass('in');
            $('#tabs-2-tab-' + (window.currentIndex)).prop('aria-expanded', true);
            $('#tabs-1-tab-' + (window.currentIndex)).parent().addClass('active');
            $('#tabs-1-tab-' + (window.currentIndex)).prop('aria-expanded', true);


            for (i = window.currentIndex + 1; i < window.nbStepForm; i++) {
                $('#tabs-2-tab-' + i).removeClass('active');
                $('#tabs-2-tab-' + i).removeClass('in');
                $('#tabs-2-tab-' + i).prop('aria-expanded', false);
                $('#tabs-1-tab-' + i).parent().removeClass('active');
                $('#tabs-1-tab-' + i).prop('aria-expanded', false);

            }
            if (window.currentIndex == window.nbStepForm - 1) {
                $('#next-form').html('Submit');
                $('#next-form').addClass('btn-success');
                $('#next-form').removeClass('btn-inline');

            } else {
                $('#next-form').html('Next');
                $('#next-form').removeClass('btn-success');
                $('#next-form').addClass('btn-inline');
            }
        }

    });

    $('#prev-form').on('click', function (e) {
        for (i = 0; i < window.currentIndex; i++) {
            $('#tabs-2-tab-' + i).removeClass('active');
            $('#tabs-2-tab-' + i).removeClass('in');
            $('#tabs-2-tab-' + i).prop('aria-expanded', false);
            $('#tabs-1-tab-' + i).parent().removeClass('active');
            $('#tabs-1-tab-' + i).prop('aria-expanded', false);
        }

        window.currentIndex--;
        window.currentIndex = (window.currentIndex < 0) ? 0 : window.currentIndex;

        $('#tabs-2-tab-' + (window.currentIndex)).addClass('active');
        $('#tabs-2-tab-' + (window.currentIndex)).addClass('in');
        $('#tabs-2-tab-' + (window.currentIndex)).prop('aria-expanded', true);
        $('#tabs-1-tab-' + (window.currentIndex)).parent().addClass('active');
        $('#tabs-1-tab-' + (window.currentIndex)).prop('aria-expanded', true);

        for (i = window.currentIndex + 1; i < window.nbStepForm; i++) {
            $('#tabs-2-tab-' + i).removeClass('active');
            $('#tabs-2-tab-' + i).removeClass('in');
            $('#tabs-2-tab-' + i).prop('aria-expanded', false);
            $('#tabs-1-tab-' + i).parent().removeClass('active');
            $('#tabs-1-tab-' + i).prop('aria-expanded', false);
        }
        if (window.currentIndex == window.nbStepForm - 1) {
            $('#next-form').html('Submit');
            $('#next-form').addClass('btn-success');
            $('#next-form').removeClass('btn-inline');

        } else {
            $('#next-form').html('Next');
            $('#next-form').removeClass('btn-success');
            $('#next-form').addClass('btn-inline');
        }
    });

    $(".step-form ul .nav-link").click(function (event) {
        event.preventDefault();
        event.stopPropagation();
    });

});




function validateForm(index){
    switch (index){
        case 0 :
                return validerStep1();
            break;
        case 1 :
                return validerStep2();
            break;
        case 2 :
                return validerStep3();
            break;

    }
}

function validerStep1(){
    var topic = $('#topic').val();
    var b = true;
    if(topic == '' || topic.length <= 8){
        b = false;
        $('#topic_error').html('please you must give a topic (at less 8 char) before continue');
        $('#topic').addClass('error');
    }else{
        $('#topic_error').html('');
        $('#topic').removeClass('error');
    }
    var description = $('#description').val();
    if(description == '' || description.length <= 0){
        b = false;
        $('#description_error').html('please you must give a decription of your needs before continue');
        $('#description').addClass('error');
    }else{
        $('#description_error').html('');
        $('#description').removeClass('error');
    }

    return b;
}

function validerStep2(){
    return true;
}

function validerStep3(){
    return true;
}
























