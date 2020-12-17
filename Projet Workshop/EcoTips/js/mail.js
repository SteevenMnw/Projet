function Reussi(){
    $('.reussi').removeAttr('hidden');
};
function Erreur(){
    $('.erreur').removeAttr('hidden');
};
function DisableBoutton(){
    $('.boutton').attr('disabled','true');
};

/*
function(data){                
    var dernier_mot = data.replace(/[\s-]+$/, '').split(/[\s-]/).pop(); 
    if(dernier_mot == "reussi" ){                    
        Reussi();   
        DisableBoutton();     
    }                 
    else{                     
        Erreur();   
        }             
}*/

$(function(){
    $('#envoyer').submit(function(e){
        e.preventDefault();

        $.post(
            './php/mail.php',
            {
                nom: $('#nom').val(),
                email: $('#email').val(),
                sujet: $('#sujet').val(),
                msg: $('#msg').val()
            },

            function(data){
                if(data == "reussi"){
                    Reussi();
                    DisableBoutton();
                }
                else{
                    Erreur();
                }
            }
        );
    });
    $('.reussi').click(function(e){
        $('.reussi').attr("hidden","true");
    });
    $('.erreur').click(function(e){
        $('.erreur').attr("hidden","true");
    });
});