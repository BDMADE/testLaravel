/**
 * Created by NCR on 22/01/2018.
 */



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
var percent_to_pay = 0;




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

function numberOfPageChange(elm){

    var nomber_of_page = $(elm).val();
    $('#wordpages_text_read').html((nomber_of_page * 275) + ' Words ');
    //alert(nomber_of_page);
    calculatePriceOrder();

}


function changerPaperSelect(val, elm){
    var btn = $(elm);
    $("#typeformat_id").val(val);
    $("#bloc_paper_format a").removeClass("active");
    btn.addClass("active");

}



//cout_de_la_command id du text de prix
function academicLevelChange(elm){

    var academicLevel_id = $(elm).val();
    //alert(academicLevel_id);
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


function calculatePriceOrder(){
    var academiclevel_id = parseInt($('#academiclevel_id').val());
    var deadline_id = parseInt($('#deadline_id').val());
    var typeofwork_id = parseInt($('#typeofwork_id').val());
    var number_of_page = parseInt($('#number_of_page').val());
    //var wordpage_id = parseInt($('#wordpage_id').val());
    //var userslevel_id = parseInt($('#userslevel_id').val());
    //var extratservice_id = [];
    var i = 0;

    var price = window.academicLevel[academiclevel_id][deadline_id][0];
    if(window.typeOfWorks[typeofwork_id][2]){
        price = price + window.typeOfWorks[typeofwork_id][1];
    }else{
        price = price + (price * window.typeOfWorks[typeofwork_id][0]) / 100;
    }

    price = (price + ((price * window.wordpages[1][1]) / 100)) * number_of_page;

    /*
    if(window.userlevel[userslevel_id][2]){
        price = price + window.userlevel[userslevel_id][1];
    }else{
        price = price + (price * window.userlevel[userslevel_id][0]) / 100;
    }

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
    */

    window.current_price = price;
    var percent = (price * window.percent_to_pay) / 100;

    $('#cout_de_la_command').html(""+price.toFixed(2));
    $('#montant_percent_to_bye').html(""+percent.toFixed(2));

}


$(document).ready(function(){
    calculatePriceOrder();
});