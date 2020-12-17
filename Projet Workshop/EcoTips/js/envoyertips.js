function Reussi(){
    $('.reussi').removeAttr('hidden');
};
function Erreur(){
    $('.erreur').removeAttr('hidden');
};
function DisableBoutton(){
    $('.boutton').attr('disabled','true');
};

$(function(){
    $('#envoyer').submit(function(e){
        e.preventDefault();

        $.post(
            './php/envoyertips.php',
            {
                nom: $('#nom').val(),
                prenom: $('#prenom').val(),
                email: $('#email').val(),
                titre: $('#titre').val(),
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