

var academicLevel = [];
var typeOfWorks = [];
var wordpages = [];
var userlevel = [];
var extratservices = [];
var standarddeadline = [];
var current_price = 0;
var token = "";
var base_url = "";
var discount = [0,0, ""];
var user_login = false;


/**
 * Created by NCR on 02/01/2018.
 */


$( document ).ready(function() {
    $("#bloc_paper_format a").click( function(e) {
        e.preventDefault(); /*your_code_here;*/
        return false;
    });
    //alert();
    $('#tab-login-1').hide();
    calculatePriceOrder();
});

function formatDate(date) {
    var monthNames = [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return day + ' ' + monthNames[monthIndex] + ' ' + year;
}



function changerPaperSelect(val, elm){
    var btn = $(elm);
    $("#typeformat_id").val(val);
    $("#bloc_paper_format a").removeClass("active");
    btn.addClass("active");

}
function changerWordPage(val, nb_word, elm){
    var btn = $(elm);
    $("#wordpage_id").val(val);
    var nb_page = parseInt($('#number_of_page').val());
    $('#wordpages_text_read').html((nb_page * nb_word) + ' Words ');
    $("#bloc_word_page a").removeClass("active");
    btn.addClass("active");
    wordPageChange(val);


}
function changerUserLevel(val, elm){
    var btn = $(elm);
    $("#userslevel_id").val(val);
    $("#bloc_user_level a").removeClass("active");
    btn.addClass("active");
    userLevelChange($("#userslevel_id"));

}
function changerPremiumService(elm){
    var check = $("#premium_mode").val();
    if(check == 0){
        $(elm).addClass("active");
        $("#premium_mode").val(1);
    }else{
        $(elm).removeClass("active");
        $("#premium_mode").val(0);
    }
    calculatePriceOrder();

}

function afficherTab(index){
    var ind2 = (1 +  index) % 2;
    //alert(index + " --------- " + ind2);
    $('#tab-login-'+index).show(500);
    $('#tab-login-header-'+index).addClass("active");
    $('#tab-login-'+ind2).hide(500);
    $('#tab-login-header-'+ind2).removeClass("active");
}
function modifierPage(test){
    if(test){
        $('#number_of_page').val(parseInt($('#number_of_page').val()) + 1);
    }else{
        var nb = parseInt($('#number_of_page').val());
        if(nb - 1 <= 0){
            $('#number_of_page').val(1);
            alert('the number of page must be great that zero ');
        }else{
            $('#number_of_page').val(nb - 1);
        }
    }
    numberOfPageChange($('#number_of_page'));
}

function modifierSource(test){
    if(test){
        $('#sources_page').val(parseInt($('#sources_page').val()) + 1);
    }else{
        var nb = parseInt($('#sources_page').val());
        if(nb - 1 < 0){
            $('#sources_page').val(0);
            alert('the number of page must not be less that zero ');
        }else{
            $('#sources_page').val(nb - 1);
        }
    }
}





function afficherTout(){

    console.log(window.academicLevel);
    console.log(window.typeOfWorks);
    console.log(window.wordpages);

}

//cout_de_la_command id du text de prix
function academicLevelChange(elm){

    var academicLevel_id = $(elm).val();
    //alert(academicLevel_id);
    calculatePriceOrder();


}

function typeOfWorkChange(elm){

    var typeofchange_id = $(elm).val();
    //alert(typeofchange_id);
    calculatePriceOrder();

}

function deadlineChange(elm){

    var deadline_id = $(elm).val();
    var nb_days = window.standarddeadline[deadline_id][1];
    //var text = moment().add(nb_days, 'days').format('MMMM Do YYYY, h:mm a');
    var dd = new Date();
    //alert(dd.toString());
    dd.setDate(dd.getDate() + parseInt(nb_days));
    $('#id-display-deadline-text').html('Ready by ' + formatDate(dd));
    //alert(deadline_id);
    calculatePriceOrder();

}

function wordPageChange(valeur){

    //alert(valeur);
    calculatePriceOrder();

}

function numberOfPageChange(elm){

    var nomber_of_page = $(elm).val();
    $('#wordpages_text_read').html((nomber_of_page * 275) + ' Words ');
    //alert(nomber_of_page);
    calculatePriceOrder();

}
function userLevelChange(elm){

    var nomber_of_page = $(elm).val();
    //alert(nomber_of_page);
    calculatePriceOrder();

}
function extratServiceChange(elm){

    var extrat_service = $(elm).val();
    //alert(extrat_service);
    calculatePriceOrder();

}

function calculatePriceOrder(){
    var academiclevel_id = parseInt($('#academiclevel_id').val());
    var deadline_id = parseInt($('#deadline_id').val());
    var typeofwork_id = parseInt($('#typeofwork_id').val());
    var number_of_page = parseInt($('#number_of_page').val());
    var wordpage_id = parseInt($('#wordpage_id').val());
    //var userslevel_id = parseInt($('#userslevel_id').val());
    var extratservice_id = [];
    var premium_mode = $("#premium_mode").val() == 1;
    var i = 0;
    var price = 0;
    if(premium_mode)
        price = window.academicLevel[academiclevel_id][deadline_id][1];
    else
        price = window.academicLevel[academiclevel_id][deadline_id][0];

    if(window.typeOfWorks[typeofwork_id][2]){
        price = price + window.typeOfWorks[typeofwork_id][1];
    }else{
        price = price + (price * window.typeOfWorks[typeofwork_id][0]) / 100;
    }

    price = (price + ((price * window.wordpages[wordpage_id][1]) / 100)) * number_of_page;

    /*
    if(window.userlevel[userslevel_id][2]){
        price = price + window.userlevel[userslevel_id][1];
    }else{
        price = price + (price * window.userlevel[userslevel_id][0]) / 100;
    }
    */

    $('input[name="extratservice_id[]"]:checked').each(function() {
        if(window.extratservices[parseInt(this.value)][2]){
            price = price + window.extratservices[parseInt(this.value)][1];
        }else{
            price = price + (price * window.extratservices[parseInt(this.value)][0]) / 100;
        }
    });

    if(window.discount[1] == 1)
        price = price - window.discount[0];
    else
        price = price - (price * window.discount[0])/100;


    window.current_price = price;

    $('#cout_de_la_command').html(""+price.toFixed(2));

}


function applyDiscount(url){
    var code = $('#input-code-discount').val();

    $.ajax({
        url : url,
        type : 'post',
        data : {_token : window.token, code : code},
        dataType : 'json',
        beforeSend: function() {
            $('#apply_discount').removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                console.log(result.bon.applique_prixfixe);
                console.log(result.bon.prix_percent);
                console.log(window.current_price - (window.current_price * result.bon.prix_percent)/100);
                console.log(window.discount);
                if(window.discount[0] <= 0) {
                    $('#hidden-code-discount').val(code);
                    window.discount[2] = ""+code;
                    if (result.bon.applique_prixfixe == true) {
                        window.current_price -= result.bon.prix_fixe;
                        window.discount = [result.bon.prix_fixe, 1];
                    }else {
                        window.current_price = window.current_price - (window.current_price * result.bon.prix_percent) / 100;
                        window.discount = [result.bon.prix_percent, 0];
                    }
                    $('#cout_de_la_command').html("" + window.current_price.toFixed(2));
                }else{
                    $('#message_discount').html("This code is allready apply");
                }
            }else{
                $('#message_discount').html("Your discount code is no more valid");
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#apply_discount').addClass('hidden');

        }

    });

}

function statusChangeCallback(response){
    console.log(response);
}


function facebookLogin(){
    FB.login(function(response) {
        if (response.authResponse) {
            $('#tab-login-1').hide();
            $('#tab-login-2').hide();
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', { locale: 'en_US', fields: 'name, email' }, function(response) {
                if(response.email != "")
                    saveAndConnectUser(response.email, response.name);
                else {
                    $('#error_login1').html("You have no email adresse on your facebook account, try to use google please !!!");
                    $('#error_login2').html("You have no email adresse on your facebook account, try to use google please !!!");
                }
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }

    }, {scope: 'public_profile,email'});
}

function googleLogin(){
    gapi.auth2.getAuthInstance().signIn().then(
        function(success) {
            //console.log(success);
            //console.log(success.w3.U3);
            //console.log(success.w3.ig);
            saveAndConnectUser(success.w3.U3, success.w3.ig);
        },
        function(error) {
            alert('oupss !!! something looking bad, please refresh and try again');
            // Error occurred
            // console.log(error) to find the reason
        }
    );
}





function allReadyRegistred(connected){
    if(connected){
        $('#box-login-register').html("<h2 style='text-align: center; color : #2bb32e;'> You are already connected !!!</h2>");
    }
}

//saveAndConnectUser('test2@test.com', 'testuser')
function saveAndConnectUser(email, name){

    $.ajax({
        url : window.base_url+'/save-and-connect-user',
        type : 'post',
        data : {_token : window.token, email : email, name : name},
        dataType : 'json',
        beforeSend: function() {
            $('#facebook_login1').removeClass('hidden');
            $('#facebook_login2').removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                //box-login-register
                window.user_login = true;
                $('#box-login-register').html("<h1> You are Signed In !!!</h1>");
            }else{
                $('#error_login1').html("failed to login on our server, please try again");
                $('#error_login2').html("failed to login on our server, please try again");
            }
        },

        error : function(resultat, statut, erreur){
            //alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#facebook_login1').addClass('hidden');
            $('#facebook_login2').addClass('hidden');

        }

    });

}

function loginUser(){

    var email = $('#email_login').val();
    var pwd = $('#password_login').val();
    var remember = $('#password_login').is(':checked');
    $.ajax({
        url : window.base_url+'/login-user',
        type : 'post',
        data : {_token : window.token, email : email, pwd : pwd, remember : remember},
        dataType : 'json',
        beforeSend: function() {
            $('#standard_login').removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                //box-login-register
                window.user_login = true;
                $('#box-login-register').html("<h1> You are now logged !!!</h1>");
            }else{
                $('#error_login1').html("please check your parameters and try again ");
                $('#error_login2').html("please check your parameters and try again ");
            }
        },

        error : function(resultat, statut, erreur){
            //alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#standard_login').addClass('hidden');

        }

    });

}


function registerUser(){

    var email = $('#register_email').val();
    var pwd = $('#register_pwd').val();
    var remember = $('#register_remember').is(':checked');
    var phone = $('#register_phone').val();

    $.ajax({
        url : window.base_url+'/register-user',
        type : 'post',
        data : {_token : window.token, email : email, pwd : pwd, remember : remember, phone : phone},
        dataType : 'json',
        beforeSend: function() {
            $('#standard_register').removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                //box-login-register
                window.user_login = true;
                $('#box-login-register').html("<h1> You are now registred !!!</h1>");
            }else{
                $('#error_login1').html("you are already registred, please login here and complete your order ");
                $('#error_login2').html("you are already registred, please login here and complite your order  ");
                $( "#tab-login-header-0" ).trigger( "click" );
            }
        },

        error : function(resultat, statut, erreur){
            //alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#standard_register').addClass('hidden');

        }

    });

}


function setCountry(code, lien, indicafit){
    //alert(lien);
    var img = $('#dropdownMenu2').find('img:first');
    var span = $('#dropdownMenu2').find('span:first');

    img.prop('src', lien);
    span.html('(+'+indicafit+')');
    $('#pays_code').val(code);
}

function viewPwd(ischeck, id){
    if(ischeck){
        $('#'+id).prop('type', 'text');
    }else{
        $('#'+id).prop('type', 'password');
    }
}




















