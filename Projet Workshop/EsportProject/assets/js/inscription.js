function Erreur(){
    $('.erreur').removeAttr('hidden');
};
function DisableBoutton(){
    $('.bouton').attr('disabled','true');
};

$(function(){
    $('#inscription').submit(function(e){
        e.preventDefault();

        $.post(
            '../php/signup.php',
            {
                nom: $('#nom').val(),
                prenom: $('#prenom').val(),
                email: $('#email').val(),
                login: $('#login').val(),
                mdp: $('#mdp').val()
            },

            function(data){
                alert(data);
                if(data == "reussi"){
                    DisableBoutton();
                    window.location.href = '../../index.php';
                }
                else{
                    Erreur();
                }
            }
        );
    });
    $('.erreur').click(function(e){
        $('.erreur').attr("hidden","true");
    });
});
