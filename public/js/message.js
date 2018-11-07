


function formaterMessageSend(is_user, msg, avatar, nom_structure){
    if(is_user) {
        var lehtml =
            '<div class="direct-chat-msg right">' +
            '<div class="direct-chat-info clearfix">' +
            '<span class="direct-chat-name pull-right">You</span>' +
            '<span class="direct-chat-timestamp pull-left">' + msg['date'] + '</span>' +
            '</div>' +
            '<img src="'+avatar+'" class="direct-chat-img"/>' +
            '<div class="direct-chat-text">' + msg['msg'] + '</div>'+
            '</div>';
        return lehtml;
    }else{
        var lehtml = '';
        for(var i = 0; i < msg.msg.length; i++ ) {
            lehtml +=
                '<div class="direct-chat-msg">' +
                '<div class="direct-chat-info clearfix">' +
                '<span class="direct-chat-name pull-left">'+nom_structure+' (' + msg.msg[i]['name'] + ')</span>' +
                '<span class="direct-chat-timestamp pull-right">' + msg.msg[i]['date'] + '</span>' +
                '</div>' +
                '<img src="' + window.logo + '" class="direct-chat-img" >' +
                '<div class="direct-chat-text">' + msg.msg[i]['msg'] + '</div>' +
                '</div>';
        }
        return lehtml;
    }
}


function envoyerMessage(url, id, avatar){

    var msg = $('#message-text').val();
    var nom_structure = $('#nom_structure').val();

    $.ajax({
        url : url,
        type : 'post',
        data : {_token : window.token, msg : msg, user_id : id},
        dataType : 'json',
        beforeSend: function() {
            $('#send_message').removeClass('hidden');
        },
        success : function(result, statut){
            $('#ledernier_message').before(formaterMessageSend(true, result, avatar, nom_structure));
            $('#message-text').val('');
            $('#message-text').html('');

        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#send_message').addClass('hidden');

        }

    });
}




function getLasttedMessage(){

    var last_id_msg = $('#last-id-msg').val();
    var user_id = $('#user_id').val();
    var nom_structure = $('#nom_structure').val();

    $.ajax({
        url : window.base_url+'/get-last-message',
        type : 'post',
        data : {_token : window.token, last_id_msg : last_id_msg, user_id : user_id},
        dataType : 'json',
        beforeSend: function() {

        },
        success : function(result, statut){
            $('#ledernier_message').before(formaterMessageSend(false, result, '', nom_structure));
            if(result.msg.length > 0)
                $('#last-id-msg').val(result.last_id);


        },

        error : function(resultat, statut, erreur){
            //alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){


        }

    });
}








$(document).ready(function($) {
    $('.direct-chat-messages').on("DOMSubtreeModified",function(){
        $(this).animate({scrollTop:$('#ledernier_message').offset().top},500);
    });


    window.getLastMessageCmd = setInterval(getLasttedMessage, 5000);

});



