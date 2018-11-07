/**
 * Created by NCR on 13/01/2018.
 */

function redirect(){
    window.location.href = url;
}


function changeEtatOrder(id, valeur){
    //console.log(valeur == "IN PROGRESS");
    $.ajax({
        url : window.base_url+'/change-etat',
        type : 'post',
        data : {_token : window.token, order_id : id, etat : valeur},
        dataType : 'json',
        beforeSend: function() {
            $('#etat_loader_'+id).removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == 1){
                if(valeur == "BIDDING") {
                    $('#label_etat_' + id).removeClass('label-success');
                    $('#label_etat_' + id).removeClass('label-danger');
                    $('#label_etat_' + id).html(result.valeur);
                    $('#label_etat_' + id).addClass('label-info');
                }else if(valeur == "IN PROGRESS") {
                    $('#label_etat_' + id).removeClass('label-info');
                    $('#label_etat_' + id).removeClass('label-danger');
                    $('#label_etat_' + id).html(result.valeur);
                    $('#label_etat_' + id).addClass('label-success');
                }else if(valeur == "COMPLETED") {
                    $('#label_etat_' + id).removeClass('label-info');
                    $('#label_etat_' + id).removeClass('label-success');
                    $('#label_etat_' + id).html(result.valeur);
                    $('#label_etat_' + id).addClass('label-danger');
                }
                $('#error_etat_'+id).html("");
            }else{
                $('#error_etat_'+id).html("fail to change");
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#etat_loader_'+id).addClass('hidden');

        }

    });
}



function changeRoleUser(id, role, ex_slug){
    console.log(role);
    $.ajax({
        url : window.base_url+'/change-role',
        type : 'post',
        data : {_token : window.token, user_id : id, role_id : role},
        dataType : 'json',
        beforeSend: function() {
            $('#role_loader_'+id).removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == 1){
                console.log(result);
                $('#label_role_' + id).html(result.role_name);
                $('#label_role_' + id).addClass('label-warning');
                $('#error_role_'+id).html("");
                /*
                if((result.role_slug == 'admin' || result.role_slug == 'superadmin') && ex_slug == 'client'){
                    var text = $( "#user_"+id).clone();
                    $( "#user_"+id).remove();
                    text.appendTo($( "#user_admin" ));
                }else if((ex_slug == 'admin' || ex_slug == 'superadmin') && result.role_slug == 'client'){
                    var text = $( "#user_"+id).clone();
                    $( "#user_"+id).remove();
                    text.appendTo($( "#user_customers" ));

                }
                */
            }else{
                $('#error_role_'+id).html("fail to change");
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#role_loader_'+id).addClass('hidden');

        }

    });
}



/************************************ Messages ********************************************************************/
function formaterAllMessage(msg, nom_structure){
    var lehtml = '';
    for(var i = 0; i < msg.msg.length; i++ ) {
        if(!msg.msg[i]['is_user']) {
            lehtml +=
                '<div class="direct-chat-msg right">' +
                '<div class="direct-chat-info clearfix">' +
                '<span class="direct-chat-name pull-right">'+nom_structure+' ('+msg.msg[i]['name']+')</span>' +
                '<span class="direct-chat-timestamp  pull-left">' + msg.msg[i]['date'] + '</span>' +
                '</div>' +
                '<img src="' + window.logo + '" class="direct-chat-img"/>' +
                '<div class="direct-chat-text">' + msg.msg[i]['msg'] + '</div>'+
                '</div>';

        }else{
                lehtml +=
                    '<div class="direct-chat-msg">' +
                    '<div class="direct-chat-info clearfix">' +
                    '<span class="direct-chat-name pull-left">' + msg.msg[i]['name'] + '</span>' +
                    '<span class="direct-chat-timestamp pull-right">' + msg.msg[i]['date'] + '</span>' +
                    '</div>' +
                    '<img src="'+msg.msg[i]['avatar']+'" class="direct-chat-img" >' +
                    '<div class="direct-chat-text">' + msg.msg[i]['msg'] + '</div>' +
                    '</div>';

        }
    }
    return lehtml;
}

function formaterMessageSend(is_user, msg, nom_structure){
    if(!is_user) {
        var lehtml =
            '<div class="direct-chat-msg right">' +
            '<div class="direct-chat-info clearfix">' +
            '<span class="direct-chat-name pull-right">'+nom_structure+' (You)</span>' +
            '<span class="direct-chat-timestamp  pull-left">' + msg['date'] + '</span>' +
            '</div>' +
            '<img src="' + window.logo + '" class="direct-chat-img"/>' +
            '<div class="direct-chat-text">' + msg['msg'] + '</div>'+
            '</div>';
        return lehtml;
    }else{
        var lehtml = '';
        for(var i = 0; i < msg.msg.length; i++ ) {
            lehtml +=
                '<div class="direct-chat-msg">' +
                '<div class="direct-chat-info clearfix">' +
                '<span class="direct-chat-name pull-left">' + msg.msg[i]['name'] + '</span>' +
                '<span class="direct-chat-timestamp pull-right">' + msg.msg[i]['date'] + '</span>' +
                '</div>' +
                '<img src="'+msg.avatar+'" class="direct-chat-img" >' +
                '<div class="direct-chat-text">' + msg.msg[i]['msg'] + '</div>' +
                '</div>';
        }
        return lehtml;
    }
}



function envoyerMessageAdmin(url, id){

    var msg = $('#message-text').val();
    var user_id = $('#user_id').val();
    var nom_structure = $('#nom_structure').val();

    $.ajax({
        url : url,
        type : 'post',
        data : {_token : window.token, msg : msg, user_id : user_id, admin : id},
        dataType : 'json',
        beforeSend: function() {
            $('#send_message').removeClass('hidden');
        },
        success : function(result, statut){
            $('#ledernier_message').before(formaterMessageSend(false, result, nom_structure));
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

    $.ajax({
        url : window.base_url+'/get-last-message-user',
        type : 'post',
        data : {_token : window.token, last_id_msg : last_id_msg, user_id : user_id},
        dataType : 'json',
        beforeSend: function() {

        },
        success : function(result, statut){
            $('#ledernier_message').before(formaterMessageSend(true, result, ''));
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




function chargerConversation(user_id){

    var nom_structure = $('#nom_structure').val();
    $('#liste-fichier-partager').html('');


    $.ajax({
        url : window.base_url+'/charger-msg-user',
        type : 'post',
        data : {_token : window.token, user_id : user_id},
        dataType : 'json',
        beforeSend: function() {

        },
        success : function(result, statut){

            $('#file_user_id').val(user_id);
            $('#box-message-admin').html(formaterAllMessage(result, nom_structure) + '<div id="ledernier_message"></div>');
            $('#last-id-msg').val(result.last_id);
            $('#user_id').val(user_id);
            $('#user-name-chat-title').html(result.user_name);
            console.log(result);
            if(result.files.length > 0){
                var lehtml = '';
                for(var i = 0; i < result.files.length; i++){
                    lehtml += '<li>'+
                        '<a href="'+result.files[i].url+'" class="'+result.files[i].class+'" target="_blank">'+
                        result.files[i].nom+' <br>'+
                        '<small class="">'+
                        '(By '+result.files[i].proprietaire+')'+
                        '</small>'+
                        '</a>'+
                        '</li>';
                }
                $('#liste-fichier-partager').html(lehtml);
                $('#send-new-file').addClass('hidden');
                $('#new-files').html('');
                var $el = $('#fichier');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.unwrap();
            }


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

function removeClasseFromElm(laclass, id){
    $('#'+id).removeClass(laclass);
}

function simpleUpdate(id, input_id, loader_id, url){

    var val = $('#'+input_id+id).val();
    var day = 0;
    if($('#'+input_id+'sd_'+id).length > 0)
        day = $('#'+input_id+'sd_'+id).val();

    $.ajax({
        url : window.base_url+'/'+url,
        type : 'post',
        data : {_token : window.token, id : id, val : val, day : day},
        dataType : 'json',
        beforeSend: function() {
            $('#'+loader_id+id).removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                $('#'+input_id+id).addClass('success');
                $('#'+input_id+id).removeClass('error');
                setTimeout("removeClasseFromElm('success', '" + input_id + id + "')", 4000);
            }else{
                $('#'+input_id+id).addClass('error');
                $('#'+input_id+id).removeClass('success');
                setTimeout("removeClasseFromElm('error', '" + input_id + id + "')", 4000);
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#'+loader_id+id).addClass('hidden');

        }

    });
}

function newLine(paper, input_id, loader_id, loader_del_id){
    lehtml = '<tr id="'+paper['row_id']+'">'+
                '<td>'+
                    '<input type="text" class="form-control" value="'+paper['nom']+'" name="'+input_id+paper['id']+'" id="'+input_id+paper['id']+'">'+
                '</td>';
    if ("day" in paper){
        lehtml += '<td>'+
                    '<input type="text" class="form-control" value="'+paper['day']+'" name="'+input_id+'sd_'+paper['id']+'" id="'+input_id+'sd_'+paper['id']+'">'+
                '</td>';
    }
    lehtml += '<td>'+
                    '<button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdate('+paper['id']+', \''+input_id+'\', \''+paper['loader_up']+'\', \''+paper['url_update']+'\')">'+
                        '<i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="'+loader_id+paper['id']+'"></i>'+
                    '</button> '+
                    '<button type="button" title="delete" class="btn btn-danger btn-xs" onclick="simpleDelete('+paper['id']+', \''+paper['row_id']+'\', \''+paper['url_delete']+'\', \''+paper['del_msg']+'\', \''+loader_del_id+'\')">'+
                        '<i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="'+loader_del_id+paper['id']+'"></i>'+
                    '</button>'+
                '</td>'+
            '</tr>';
    return lehtml;
}

function simpleDelete(id, line_id, url, text, loader){

    if(confirm("are you shor you want to delete this " + text)){
        $.ajax({
            url : window.base_url + '/' + url,
            type : 'post',
            data : {_token : window.token, id : id},
            dataType : 'json',
            beforeSend: function() {
                $('#'+loader).removeClass('hidden');
            },
            success : function(result, statut){
                if(result.statu == "1"){
                    $('#'+line_id).remove();
                    alert('done');
                }else{
                    alert('error : can\'t delete that element');
                }
            },

            error : function(resultat, statut, erreur){
                alert('error');
                console.log(resultat);
                console.log(statut);
                console.log(erreur);
            },

            complete : function(resultat, statut){
                $('#'+loader).addClass('hidden');

            }

        });
    }


}

function simpleAdd(id, loader, url, table_id, input_id, loader_id, loader_del_id, input_add_id){

    var val = $('#'+id).val();
    var day = 0;
    if($('#'+id+'_sd').length > 0)
        day = $('#'+id+'_sd').val();

    $.ajax({
        url : window.base_url + '/' + url,
        type : 'post',
        data : {_token : window.token, val : val, day : day},
        dataType : 'json',
        beforeSend: function() {
            $('#'+loader).removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                $('#'+table_id).append(newLine(result, input_id, loader_id, loader_del_id));
                $('#'+input_id+id).addClass('success');
                $('#'+input_id+id).removeClass('error');
                setTimeout("removeClasseFromElm('success', '" + input_id + result.id + "')", 4000);
                $('#'+input_add_id).addClass('success');
                $('#'+input_add_id).removeClass('error');
                setTimeout("removeClasseFromElm('success', '"+input_add_id+"')", 2000);
                setTimeout(function(){$('#'+input_add_id).val('');}, 2000);

            }else{
                $('#'+input_add_id).addClass('error');
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#'+loader).addClass('hidden');

        }

    });
}



function simpleUpdateTree(id, input_id, loader_id, url, row_id){

    var val = $('#'+input_id+id).val();
    var valpf = $('#'+input_id+'pf'+id).val();
    var valpp = $('#'+input_id+'pp'+id).val();
    var valapp = $('#'+input_id+'apf'+id).is(':checked') ? 1 : 0;

    $.ajax({
        url : window.base_url+'/'+url,
        type : 'post',
        data : {_token : window.token, id : id, val : val, pf : valpf, pp : valpp, app : valapp},
        dataType : 'json',
        beforeSend: function() {
            $('#'+loader_id+id).removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                $('#'+row_id+id).addClass('success');
                $('#'+row_id+id).removeClass('error');
                setTimeout("removeClasseFromElm('success', '" + row_id + id + "')", 4000);
            }else{
                $('#'+row_id+id).addClass('error');
                $('#'+row_id+id).removeClass('success');
                setTimeout("removeClasseFromElm('error', '" + row_id + id + "')", 4000);
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#'+loader_id+id).addClass('hidden');

        }

    });
}


function newLineTypeOfWork(data){
    var lehtml =
            '<tr id="typeofwork_row_'+data.id+'">'+
        '<td>'+
        '<input type="text" class="form-control" value="'+data.nom+'" name="'+data.nom+'" id="typeofwork_'+data.id+'">'+
        '</td>'+
        '<td>'+
        '<div class="input-group">'+
        '<input type="text" class="form-control" value="'+data.prix_fixe+'" name="typeofwork_pf'+data.id+'" id="typeofwork_pf'+data.id+'">'+
        '<span class="input-group-addon">'+
        '<input type="radio"  value="1" name="typeofwork_apf'+data.id+'" '+( data.appliquer_prixfixe == 1 ? "checked" : "" )+'>'+
'</span>'+
    '</div>'+
    '</td>'+
    '<td>'+
    '<div class="input-group">'+
        '<input type="text" class="form-control" value="'+data.prix_percent+'" name="typeofwork_pp'+data.id+'" id="typeofwork_pp'+data.id+'">'+
        '<span class="input-group-addon">'+
        '<input type="radio"  value="0" name="typeofwork_apf{!! $tp->id !!}" '+( data.appliquer_prixfixe == 1 ? "checked" : "" )+'>'+
'</span>'+
    '</div>'+
    '</td>'+
    '<td>'+
    '<button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdateTree('+data.id+', \'typeofwork_\', \'loader-tw-up_\', \'update-typeofwork\', \'typeofwork_row_\')">'+
        '<i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tw-up_'+data.id+'"></i>'+
        '</button>'+
        '<button type="button" title="delete" class="btn btn-danger btn-xs" onclick="deleteTypeOfWork('+data.id+')">'+
        '<i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tw-del_'+data.id+'"></i>'+
        '</button>'+
        '</td>'+
        '</tr>'
        ;

    return lehtml;
}

function AddTypeOfWork(){

    var val = $('#new_typeofwork').val();
    var valpf = $('#new_typeofwork_pf').val();
    var valpp = $('#new_typeofwork_pp').val();
    var valapp = $('input[name=new_typeofwork_apf]:checked', '#new_typeofwork_row').val(); //$('#new_typeofwork_pp').val();

    console.log(val);
    console.log(valpf);
    console.log(valpp);
    console.log(valapp);

    $.ajax({
        url : window.base_url + '/add-typeofwork',
        type : 'post',
        data : {_token : window.token, val : val, pf : valpf, pp : valpp, app : valapp},
        dataType : 'json',
        beforeSend: function() {
            $('#new_loader-tw').removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                $('#typeofwork_table_body').append(newLineTypeOfWork(result));
                $('#typeofwork_row_'+result.id).addClass('success');
                $('#typeofwork_row_'+result.id).removeClass('success');
                setTimeout("removeClasseFromElm('success', '" + "typeofwork_row_" + result.id + "')", 4000);

                $('#new_typeofwork_row').addClass('success');
                $('#new_typeofwork_row').removeClass('error');
                setTimeout("removeClasseFromElm('success', 'new_typeofwork_row')", 2000);

                $('#new_typeofwork').val('');
                $('#new_typeofwork_pf').val('0');
                $('#new_typeofwork_pp').val('0');

            }else{
                $('#'+input_add_id).addClass('error');
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#new_loader-tw').addClass('hidden');

        }

    });
}

function deleteTypeOfWork(id){

    if(confirm("are you shor you want to delete this type of work")){
        $.ajax({
            url : window.base_url + '/delete-typeofwork',
            type : 'post',
            data : {_token : window.token, id : id},
            dataType : 'json',
            beforeSend: function() {
                $('#loader-tw-del_'+id).removeClass('hidden');
            },
            success : function(result, statut){
                if(result.statu == "1"){
                    $('#typeofwork_row_'+id).remove();
                    alert('done');
                }else{
                    alert('error : can\'t delete that element');
                }
            },

            error : function(resultat, statut, erreur){
                alert('error');
                console.log(resultat);
                console.log(statut);
                console.log(erreur);
            },

            complete : function(resultat, statut){
                $('#loader-tw-del_'+id).addClass('hidden');

            }

        });
    }


}




function updateWordPage(id) {

    var val = $('#wordpage_' + id).val();
    var valnb = $('#wordpage_nb' + id).val();
    var valpp = $('#wordpage_pp' + id).val();

    $.ajax({
        url: window.base_url + '/update-wordpage',
        type: 'post',
        data: {_token: window.token, id: id, val: val, nb: valnb, pp: valpp},
        dataType: 'json',
        beforeSend: function () {
            $('#loader-wp-up_' + id).removeClass('hidden');
        },
        success: function (result, statut) {
            if (result.statu == "1") {
                $('#wordpage_row_' + id).addClass('success');
                $('#wordpage_row_' + id).removeClass('error');
                setTimeout("removeClasseFromElm('success', 'wordpage_row_" + id + "')", 4000);
            } else {
                $('#wordpage_row_' + id).addClass('error');
                $('#wordpage_row_' + id).removeClass('success');
                setTimeout("removeClasseFromElm('error', 'wordpage_row_" + id + "')", 4000);
            }
        },

        error: function (resultat, statut, erreur) {
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete: function (resultat, statut) {
            $('#loader-wp-up_' + id).addClass('hidden');

        }

    });
}

function newLineWordPage(data){
    var lehtml =
            '<tr id="wordpage_row_'+data.id+'">'+
                '<td>' +
                    '<input type="text" class="form-control" value="'+data.nom+'" name="wordpage_'+data.id+'" id="wordpage_'+data.id+'">'+
                '</td>'+
                '<td>' +
                    '<input type="text" class="form-control" value="'+data.nb_word+'" name="wordpage_nb'+data.id+'" id="wordpage_nb'+data.id+'">'+
                '</td>'+
                '<td>' +
                    '<input type="text" class="form-control" value="'+data.percentage_price+'" name="wordpage_pp'+data.id+'" id="wordpage_pp'+data.id+'">'+
                '</td>' +
                '<td>'+
                    '<button type="button" title="Update" class="btn btn-info btn-xs" onclick="updateWordPage('+data.id+')">'+
                        '<i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-wp-up_'+data.id+'"></i>'+
                    '</button>'+
                    '<button type="button" title="delete" class="btn btn-danger btn-xs" onclick="deleteWordPage('+data.id+')">'+
                        '<i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-wp-del_'+data.id+'"></i>'+
                    '</button>'+
                '</td>'+
            '</tr>'
        ;

    return lehtml;
}

function AddWordPage(){

    var val = $('#new_wordpage').val();
    var valnb = $('#new_wordpage_nb').val();
    var valpp = $('#new_wordpage_pp').val();



    $.ajax({
        url : window.base_url + '/add-wordpage',
        type : 'post',
        data : {_token : window.token, val : val, nb : valnb, pp : valpp},
        dataType : 'json',
        beforeSend: function() {
            $('#new_loader-wp').removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                $('#wordpage_table_body').append(newLineWordPage(result));
                $('#wordpage_row_'+result.id).addClass('success');
                $('#wordpage_row_'+result.id).removeClass('success');
                setTimeout("removeClasseFromElm('success', '" + "wordpage_row_" + result.id + "')", 4000);

                $('#new_wordpage_row').addClass('success');
                $('#new_wordpage_row').removeClass('error');
                setTimeout("removeClasseFromElm('success', 'new_wordpage_row')", 2000);

                $('#new_wordpage').val('');
                $('#new_wordpage_nb').val('0');
                $('#new_wordpage_pp').val('0');

            }else{
                $('#'+input_add_id).addClass('error');
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#new_loader-wp').addClass('hidden');

        }

    });
}

function deleteWordPage(id){

    if(confirm("are you shor you want to delete this word page")){
        $.ajax({
            url : window.base_url + '/delete-wordpage',
            type : 'post',
            data : {_token : window.token, id : id},
            dataType : 'json',
            beforeSend: function() {
                $('#loader-wp-del_'+id).removeClass('hidden');
            },
            success : function(result, statut){
                if(result.statu == "1"){
                    $('#wordpage_row_'+id).remove();
                    alert('done');
                }else{
                    alert('error : can\'t delete that element');
                }
            },

            error : function(resultat, statut, erreur){
                alert('error');
                console.log(resultat);
                console.log(statut);
                console.log(erreur);
            },

            complete : function(resultat, statut){
                $('#loader-wp-del_'+id).addClass('hidden');

            }

        });
    }


}



function updatePrice(id, type) {

    var val = $('#price_' + type + '_'  + id).val();

    $.ajax({
        url: window.base_url + '/update-price',
        type: 'post',
        data: {_token: window.token, id: id, val: val, type: type},
        dataType: 'json',
        beforeSend: function () {
            $('#loader-price_' + type + '_'  + id).removeClass('hidden');
        },
        success: function (result, statut) {
            if (result.statu == "1") {
                $('#price_' + type + '_'  + id).addClass('success');
                $('#price_' + type + '_'  + id).removeClass('error');
                setTimeout("removeClasseFromElm('success', 'price_" + type + "_" + id + "')", 4000);
            } else {
                $('#price_' + type + '_'  + id).addClass('error');
                $('#price_' + type + '_'  + id).removeClass('success');
                setTimeout("removeClasseFromElm('error', 'price_" + type + "_" + id + "')", 4000);
            }
        },

        error: function (resultat, statut, erreur) {
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete: function (resultat, statut) {
            $('#loader-price_' + type + '_'  + id).addClass('hidden');

        }

    });
}





function updateStructure(id) {

    var val = $('#structure_per').val();

    $.ajax({
        url: window.base_url + '/update-structure',
        type: 'post',
        data: {_token: window.token, id: id, val: val},
        dataType: 'json',
        beforeSend: function () {
            $('#loader-structur').removeClass('hidden');
        },
        success: function (result, statut) {
            if (result.statu == "1") {
                $('#structure_per').addClass('success');
                $('#structure_per').removeClass('error');
                setTimeout("removeClasseFromElm('success', 'structure_per')", 4000);
            } else {
                $('#structure_per').addClass('error');
                $('#structure_per').removeClass('success');
                setTimeout("removeClasseFromElm('error', 'structure_per')", 4000);
            }
        },

        error: function (resultat, statut, erreur) {
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete: function (resultat, statut) {
            $('#loader-structur').addClass('hidden');

        }

    });
}



function updateBonReduction(id) {

    var date_debut = $('#date_debut_'+id).val();
    var date_fin = $('#date_fin_'+id).val();
    var nb_jour_valide = $('#nb_jour_valide_'+id).val();
    var prix_fixe = $('#prix_fixe_'+id).val();
    var prix_percent = $('#prix_percent_'+id).val();
    var nb_user_max = $('#nb_user_max_'+id).val();
    var nb_user_utiliser = $('#nb_user_utiliser_'+id).val();
    var app = $('input[name=radio_bonreductions_'+id+']:checked', '#bonreductions_table_body').val(); //$('#radio_bonreductions_').val();

    $.ajax({
        url: window.base_url + '/update-bonreduction',
        type: 'post',
        data: {_token: window.token, id: id, date_debut: date_debut, date_fin: date_fin,
            nb_jour_valide: nb_jour_valide, prix_fixe: prix_fixe, prix_percent: prix_percent,
            nb_user_max: nb_user_max, nb_user_utiliser: nb_user_utiliser, app : app},
        dataType: 'json',
        beforeSend: function () {
            $('#bonreductions-up_'+id).removeClass('hidden');
        },
        success: function (result, statut) {
            if (result.statu == "1") {
                $('#bonreductions_row_'+id).addClass('success');
                $('#bonreductions_row_'+id).removeClass('error');
                setTimeout("removeClasseFromElm('success', 'bonreductions_row_"+id+"')", 4000);
            } else {
                $('#bonreductions_row_'+id).addClass('error');
                $('#bonreductions_row_'+id).removeClass('success');
                setTimeout("removeClasseFromElm('error', 'bonreductions_row_"+id+"')", 4000);
            }
        },

        error: function (resultat, statut, erreur) {
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete: function (resultat, statut) {
            $('#bonreductions-up_'+id).addClass('hidden');

        }

    });
}


function newLineBonReduction(data){
    var lehtml ='' +
            '<tr id="bonreductions_row_'+data.id+'">'+
                '<td>'+
                    data.code+
                '</td>'+
                '<td>'+
                '<input type="text" id="date_debut_'+data.id+'" value="'+data.date_debut+'" class="form-control" readonly  >'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" id="date_fin_'+data.id+'" value="'+data.date_fin+'" class="form-control datepicker" readonly >'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" id="nb_jour_valide_'+data.id+'" value="'+data.nb_jour_valide+'" class="form-control datepicker">'+
                    '</td>'+
                    '<td>'+
                    '<div class="input-group">'+
                    '<input type="text" id="prix_fixe_'+data.id+'" value="'+data.prix_fixe+'" class="form-control" >'+
                    '<span class="input-group-addon">'+
                    '<input type="radio"  value="1" name="radio_bonreductions_'+data.id+'" '+((data.applique_prixfixe == 1) ? "checked" : "")+'>'+
                '</span>'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<div class="input-group">'+
                    '<input type="text" id="prix_percent_'+data.id+'" value="'+data.prix_percent+'" class="form-control" >'+
                    '<span class="input-group-addon">'+
                    '<input type="radio"  value="0" name="radio_bonreductions_'+data.id+'"   '+((data.applique_prixfixe == 0) ? "checked" : "")+'>'+
                '</span>'+
                '</div>'+
                '</td>'+
                '<td>'+
                '<input type="number" id="nb_user_max_'+data.id+'" value="'+data.nb_user_max+'" class="form-control" >'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" readonly id="nb_user_utiliser_'+data.id+'" value="'+data.nb_user_utiliser+'" class="form-control" >'+
                    '</td>'+
                    '<td> </td>'+

                '<td>'+
                '<button type="button" title="Update" class="btn btn-info btn-xs" onclick="updateBonReduction('+data.id+')">'+
                    '<i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="bonreductions-up_{!! $tp->id !!}"></i>'+
                    '</button>'+
                    '<button type="button" title="delete" class="btn btn-danger btn-xs" onclick="deleteBonReduction('+data.id+')">'+
                    '<i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="bonreductions-del_'+data.id+'"></i>'+
                    '</button>'+
                    '</td>'+
                    '</tr>'

        ;

    return lehtml;
}

function addBonReduction(){

    var code = $('#new_code').val();
    var date_debut = $('#new_date_debut').val();
    var date_fin = $('#new_date_fin').val();
    var nb_jour_valide = $('#new_nb_jour_valide').val();
    var prix_fixe = $('#new_prix_fixe').val();
    var prix_percent = $('#new_prix_percent').val();
    var nb_user_max = $('#new_nb_user_max').val();
    var nb_user_utiliser = $('#new_nb_user_utiliser').val();
    var app = $('input[name=new_radio_bonreductions]:checked', '#new_bonreductions_row').val(); //$('#radio_bonreductions_').val();



    $.ajax({
        url : window.base_url + '/add-bonreduction',
        type : 'post',
        data: {_token: window.token, date_debut: date_debut, date_fin: date_fin,
            nb_jour_valide: nb_jour_valide, prix_fixe: prix_fixe, prix_percent: prix_percent,
            nb_user_max: nb_user_max, nb_user_utiliser: nb_user_utiliser, app : app, code : code},
        dataType : 'json',
        beforeSend: function() {
            $('#new_bonreductions_loader').removeClass('hidden');
        },
        success : function(result, statut){
            if(result.statu == "1"){
                $('#bonreductions_table_body').append(newLineBonReduction(result));
                $('#bonreductions_row_'+result.id).addClass('success');
                $('#bonreductions_row_'+result.id).removeClass('error');
                setTimeout("removeClasseFromElm('success', '" + "bonreductions_row_" + result.id + "')", 4000);

                $('#new_bonreductions_row').addClass('success');
                $('#new_bonreductions_row').removeClass('error');
                setTimeout("removeClasseFromElm('success', 'new_bonreductions_row')", 2000);

                //$('#new_date_debut').val();
                //$('#new_date_fin').val();
                $('#new_nb_jour_valide').val('0');
                $('#new_prix_fixe').val('0');
                $('#new_prix_percent').val('0');
                $('#new_nb_user_max').val('0');
                $('#new_code').val('');
                $('.datepicker').datepicker({format: "yyyy-mm-dd"});

            }else{
                $('#'+input_add_id).addClass('error');
            }
        },

        error : function(resultat, statut, erreur){
            alert('error');
            console.log(resultat);
            console.log(statut);
            console.log(erreur);
        },

        complete : function(resultat, statut){
            $('#new_bonreductions_loader').addClass('hidden');

        }

    });
}


function deleteBonReduction(id){

    if(confirm("are you shor you want to delete this discount")){
        $.ajax({
            url : window.base_url + '/delete-bonreduction',
            type : 'post',
            data : {_token : window.token, id : id},
            dataType : 'json',
            beforeSend: function() {
                $('#bonreductions-del_'+id).removeClass('hidden');
            },
            success : function(result, statut){
                if(result.statu == "1"){
                    $('#bonreductions_row_'+id).remove();
                    alert('done');
                }else{
                    alert('error : can\'t delete that element');
                }
            },

            error : function(resultat, statut, erreur){
                alert('error');
                console.log(resultat);
                console.log(statut);
                console.log(erreur);
            },

            complete : function(resultat, statut){
                $('#bonreductions-del_'+id).addClass('hidden');

            }

        });
    }


}



$(document).ready(function($) {
    $('.direct-chat-messages').on("DOMSubtreeModified",function(){
        $(this).animate({scrollTop:$('#ledernier_message').offset().top},500);
    });


    //window.getLastMessageCmd = setInterval(getLasttedMessage, 5000);

});



/*************************************************************************************************************************/







