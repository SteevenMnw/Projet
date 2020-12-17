function Alert(){
    $('.Alert').removeAttr('hidden');
};

$(function(){
    $('#connexion').submit(function(e){
        e.preventDefault();

        $.post(
            './php/connexionsite.php',
            {
                utilisateur: $('#utilisateur').val(),
                mdp: $('#mdp').val()
            },

            function(data){
                if(data == 'A')
                {
                    window.location.href = './administrateur.php';
                }
                else
                {
                    Alert();
                }
            }
        );
    });
    $('.Alert').click(function(e){
        $('.Alert').attr("hidden","true");
    });
});
