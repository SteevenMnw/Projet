
//Fonction qui modifierai la valeur soit à 1 (Fait) soit à 0 (Non fait)
//Dis moi si tu trouve la solution!
// idée : Selon le 0 et le 1, enregistrer cette valeur dans la BDD puis refaire une requête en GET afin de modifier le background en vert léger sur la ligne résolue et rouge léger sur la ligne non résolue.
$(function (){

    let btnCheck = document.getElementById('boutonCheck');
    
    btnCheck.addEventListener('click', ()=>{
        alert('CLIC');
        
        if($('#boutonCheck').val() != 1){
            $.post(
                './php/administrateur.php',
                {   
                    status: $('#boutonCheck').val('1'),
                },

            );
        }else{
            $.post(
                './php/administrateur.php',
                {   
                    status: $('#boutonCheck').val('0'),
                },

            );
        }
    });

});

    
