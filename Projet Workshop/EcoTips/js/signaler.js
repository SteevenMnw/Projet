function Succes(){
    $('.succes').removeAttr('hidden');
};

function Erreur(){
    $('.erreur').removeAttr('hidden');
};

function DisableButton(){
    $('.boutton').attr('disabled','true');
};

$(function(){
    $('#form-signalement').submit(function(e){
        e.preventDefault();

        $.post(
            './php/envoyersignalement.php',
            {   
                id: $('').val(),
                nom: $('#nom').val(),
                prenom: $('#prenom').val(),
                email: $('#email').val(),
                probleme: $('#probleme').val(),
            },

            function(data){
                var dernier_mot = data.replace(/[\s-]+$/, '').split(/[\s-]/).pop();
                if(dernier_mot == "SUCCES"){
                    Succes();
                    DisableButton();
                }else{
                    Erreur();
                }
            }
        );
    });

    $('.succes').click(function(e){
        $('.succes').attr("hidden","true");
    });

    $('.erreur').click(function(e){
        $('.erreur').attr("hidden","true");
    });

});