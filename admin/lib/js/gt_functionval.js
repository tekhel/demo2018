$(document).ready(function () {

    //pour pouvoir utiliser regex
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");

    
    
    
    //champs -> identifiants id=""
    $("#form_commande").validate({
        rules: {
            email1: "required",
            email2: {
                equalTo: "#email1"                
            },
            nom: "required",
            prenom: "required",
            telephone: {
                required: true,
                regex: /^(0)[0-9]{2,3}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            adresse: "required",
            numero: "required",
            codepostal: {
                required: true,
                min: 1000,
                max: 9999
            },
            localite: "required",
            submitHandler: function (form) {
                form.submit();
            }
        }
    });

    //TRADUCTION DES MESSAGES DE VALIDATION EN FRANÇAIS
    $.extend($.validator.messages, {
        required: "Veuillez renseigner ce champ.",
        email: "Veuillez renseigner un email valide.",
        url: "Url non conforme.",
        date: "Date non valide.",
        number: "Veuillez n'entrer que des chiffres.",
        digits: "Veuillez n'entrer que des chiffres.",
        equalTo: "Les champs ne concordent pas.",
        maxlength: $.validator.format("Entrez au maximum {0} caract&egrave;res."),
        minlength: $.validator.format("Entrez au minimum {0} caract&egrave;res."),
        rangelength: $.validator.format("Votre entrée doit compter entre {0} et {1} caract&egrave;res."),
        range: $.validator.format("Entrez un nombre entre {0} et {1}."),
        max: $.validator.format("Entrez un nombre inférieur ou égal à {0}."),
        min: $.validator.format("Entrz un nombre de minimum {0}."),
        regex: "Format non conforme"
    });


});

$("#coucou").hide();


$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});


/** fonction bouton back top **/
$(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
    	if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});






/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});



$(document).ready(function () {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap'
    });
});
   