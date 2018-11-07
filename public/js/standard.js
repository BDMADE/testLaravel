
var logo = "";
var geturl = "";
var getLastMessageCmd = "";


/***************************** lauch modal login ****************************************/

function loginModal(){
    //alert();
    $('#loginModal').modal('show');
    $('#email').focus();
}
function loginModal2(){
    //alert();
    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
    $('#email').focus();
}
function loginModal3(){
    //alert();
    $('#emailModal').modal('hide');
    $('#loginModal').modal('show');
    $('#email').focus();
}

/***************************** lauch modal register ****************************************/

function registerModal(){
    //alert();
    $('#registerModal').modal('show');
    $('#email').focus();
}
function registerModal2(){
    //alert();
    $('#loginModal').modal('hide');
    $('#registerModal').modal('show');
    $('#email').focus();
}


/***************************** lauch modal reset password ****************************************/

function emailModal(){
    //alert();
    $('#loginModal').modal('hide');
    $('#emailModal').modal('show');
    $('#email').focus();
}






$(document).ready(function($) {

    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
    $(".menu_scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });


});


function payerFacture(url){
    window.location.href = url;
}








