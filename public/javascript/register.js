$(document).ready(function() {

  /*
  ************************************
  Functions : handle, validation...etc
  ************************************
  */

  //Success and Error handling
  function handle_response(json_response) {
    var response = JSON.parse(json_response);

    if (response.success) {                                    //possible to use polymorphic function taking all cases into account : reusable design pattern
      $('#register_form_log').empty().append('<p class="bg-success form_log">L\'inscription s\'est bien effectuée! Connectez vous et allez parier! </p>');

      $('#firstnamesignup').val('');
      $('#lastnamesignup').val('');
      $('#usernamesignup').val('');
      $('#passwordsignup').val('');
      $('#passwordsignup_confirm').val('');
      $('#emailsignup').val('');
      $('#addresssignup').val('');
    }
    else if (response.error.db) {
      $('#register_form_log').empty().append('<p class="bg-warning form_log">Erreur interne du serveur, votre demande n\'a pas pu être traité, veuillez reessayer plus tard! </p>');
    }
    else if (response.error.email) {
      $('#register_form_log').empty().append('<p class="bg-danger form_log">Cet email existe déjà, veuillez en choisir un autre! </p>');
    }
  };

  function validate_register() {
    var regex_email = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;    //more complicated models possible : by reading RFC 2822
    var regex_text = /^[a-zA-Z -]+$/;
    var regex_address = /^[a-zA-Z0-9 -]+$/;

    if( !regex_email.test($('#emailsignup').val()) ) {
      $('#register_form_log').empty().append('<p class="bg-danger form_log">Veuillez entrer un email valide</p>');
      return false;
    }
    else if ( !regex_text.test($('#firstnamesignup').val()) || !regex_text.test($('#lastnamesignup').val()) ) {
      $('#register_form_log').empty().append('<p class="bg-danger form_log">Veuillez entrer un nom ou prénom correct</p>');
      return false;
    }
    else if ( !regex_address.test($('#addresssignup').val()) ) {
      $('#register_form_log').empty().append('<p class="bg-danger form_log">Veuillez entrer une adresse correcte</p>');
      return false;
    }
    else if( $('#passwordsignup').val() != $('#passwordsignup_confirm').val() ) {
      $('#register_form_log').empty().append('<p class="bg-danger form_log"> Veuillez entrer deux fois le même nouveau mot de passe</p>');
      return false;
    }
    else if( $('#passwordsignup').val().length < 6 ) {
      $('#register_form_log').empty().append('<p class="bg-danger form_log"> Veuillez entrer un mot de passe de 6 caractères minimum</p>');
      return false;
    }
    else if( $('#firstnamesignup').val().length < 2 || $('#lastnamesignup').val().length < 2 || $('#usernamesignup').val().length < 2 ) {
      $('#register_form_log').empty().append('<p class="bg-danger form_log"> Veuillez entrer un nom, prénom ou nom d\'utilisateur de deux caractères ou plus</p>');
      return false;
    }

    return true;
  };

  /*
  ********************************************************************
  Dynamic Logic of the page & AJAX client-server interaction interface
  ********************************************************************
  */

  $('#register_form').on('submit', function(e) {
      e.preventDefault();

      var $this = $(this);  //buffered : jQuery Object from the form

      var info_form_target = $this.attr('action');

      if( validate_register() ) {
        $.ajax({
            url: info_form_target,
            type: $this.attr('method'),
            data: $this.serialize(),
            success: function(response_register) {
              handle_response(response_register);
            },
            error: function() {
              alert('ajax error : server might be unreachable, please retry later');
            }
        });
      }
  });

});
