$(document).ready(function () {
    
    
    //code d'autocomplétion
    $('#nom').blur(function () {
        var email1 = $('#email1').val();
        var email2 = $('#email2').val();
        var nom = $('#nom').val();
        //alert(email1+" "+email2+" "+password);
        if (($.trim(email1) !== '')) {
            //ecriture des param accompagnant le nom du fichier
            var recherche = "email=" + email1 + "&nom=" + nom;
           
           
            $.ajax({
                type: 'GET', // methode d'envoi des parametres
                data: recherche, // criteres de la query
                dataType: "json", // format des données retournées
                url: './admin/lib/php/ajax/AjaxRechercheReservation.php',
                success: function (data) {
                    alert(data[0].NUMERO);
                    console.log("coucou");
                    $('#nom').val(data[0].NOM_CLIENT);
                    $('#prenom').val(data[0].PRENOM_CLIENT);
                    $('#telephone').val(data[0].TELEPHONE);
                    $('#rue_client').val(data[0].RUE_CLIENT);
                    $('#numero').val(data[0].NUMERO);
                    $('#codepostal').val(data[0].CODEPOSTAL);
                    $('#localite').val(data[0].LOCALITE);
                }
            });
        }
    });
    
    
    
    //code pour le tableau éditable
    $("span[ID]").click(function () {
        /*
         $(this).removeClass('cke_editable');        
         $(this).removeClass('cke_editable_inline');
         $(this).removeClass('cke_contents_ltr');
         $(this).removeClass('cke_show_borders');
         $(this).removeAttr('aria-label');
         $(this).removeAttr('aria-describedby');
         $(this).removeAttr('title');
         */
        var valeur1 = $.trim($(this).text());
        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        //2 lignes suivantes pour firefox
        //$(this).contentEditable = "true";
        //$(this).addClass("borderInput");

        var ident = $(this).attr("id");
        var name = $(this).attr("nom");

        $(this).blur(function () {
            $(this).removeClass("borderInput");
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);
                
            if (valeur1 != valeur2)
            {
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "../admin/lib/php/ajax/AjaxUpdatePingouins.php",
                    success: function (data) {
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    //alert("Echec retour: " + textStatus + "\nerrorThrown: " + errorThrown);
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            }
            ;
        });
    });
});


