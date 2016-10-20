$(document).ready(function(){

  /*
  ************************************
  Functions : handle, validation...etc
  ************************************
  */

  //Success and Error handling
  function handle_response(form_description, json_response) {
    var response = JSON.parse(json_response);
    var log_location = '#' + form_description + '_form_log';

    if (response.success) {                                     //possible to use polymorphic function taking all cases into account : reusable design pattern
      //Constructing specific success message
      if (form_description == "money") {
        var success_msg = '<p class="bg-success form_log"> Bravo! Votre compte a bien été rechargé! Allez parier! </p>';
      }
      else if (form_description == "info") {
        var success_msg = '<p class="bg-success form_log"> Le changement a bien été pris en compte! Allez parier! </p>';
      }
      else if (form_description == "info_password") {
        var success_msg = '<p class="bg-success form_log"> Le mot de passe a bien été modifié! Ne l\'oubliez pas et allez parier! </p>';
      }
      //Log success
      $(log_location).empty().append(success_msg);
    }
    else if (response.error.db) {
      $(log_location).empty().append('<p class="bg-warning form_log">Erreur interne du serveur, votre demande n\'a pas pu être traité, veuillez reessayer plus tard! </p>');
    }
    else if (response.error.password) {
      $(log_location).empty().append('<p class="bg-danger form_log">Erreur de mot de passe! Veuillez réessayer... </p>');
    }
    else if (response.error.email) {
      $(log_location).empty().append('<p class="bg-danger form_log">Cet email existe déjà, veuillez en choisir un autre!</p>');
    }
  };

  function validate_money() {
    var money_amount = $('#money_amount').val();
    if( money_amount <= 0 )
    {
      $('#money_form_log').empty().append('<p class="bg-danger form_log">Veuillez entrer un montant correct</p>');
      return false;
    }
    else if (money_amount >= 50000) {
      $('#money_form_log').empty().append('<p class="bg-warning form_log">Vous rechargez considérablement votre compte, aller vous renseignez à la page Aide concernant l\'addiction au jeu</p>');
      return false;
    }
    return true;
  }

  function validate_info() {
    var regex_email = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;    //more complicated models possible : by reading RFC 2822
    var regex_text = /^[a-zA-Z -]+$/;
    var regex_address = /^[a-zA-Z0-9 -]+$/;

    if( !regex_email.test($('#new_email').val()) ) {
      $('#info_form_log').empty().append('<p class="bg-danger form_log">Veuillez entrer un email valide</p>');
      return false;
    }
    else if ( !regex_text.test($('#new_firstname').val()) || !regex_text.test($('#new_lastname').val()) ) {
      $('#info_form_log').empty().append('<p class="bg-danger form_log">Veuillez entrer un nom ou prénom correct</p>');
      return false;
    }
    else if ( !regex_address.test($('#new_address').val()) ) {
      $('#info_form_log').empty().append('<p class="bg-danger form_log">Veuillez entrer une adresse correcte</p>');
      return false;
    }

    return true;
  };

  function validate_info_password() {
    if( $('#new_password').val() != $('#new_password_control').val() )
    {
      $('#info_password_form_log').empty().append('<p class="bg-danger form_log"> Veuillez entrer deux fois le même nouveau mot de passe</p>');
      return false;
    }
    else if( $('#new_password').val().length < 6 ) {
      $('#info_password_form_log').empty().append('<p class="bg-danger form_log"> Veuillez entrer un mot de passe de 6 caractères minimum</p>');
      return false;
    }
    return true;
  };

  /*
  ********************************************************************
  Dynamic Logic of the page & AJAX client-server interaction interface
  ********************************************************************
  */

  $('#money_form_show').on('click', function(e){
      e.preventDefault();
      $('#money_form_log').empty();
      $(this).addClass('hidden');             //using bootstrap classes, if personal css display none then use: .hide() and .show() ok
      $('#money_form').removeClass('hidden');
  });

  $('#money_form_cancel').on('click', function(e){
      e.preventDefault();
      $('#money_form_log').empty();
      $('#money_form_show').removeClass('hidden');
      $('#money_form').addClass('hidden');
  });

  $('#money_form').on('submit', function(e) {
      e.preventDefault();

      var $this = $(this); // buffered : jQuery Object from the form

      var money_form_target = $this.attr('action');

      if (validate_money()) {
          $.ajax({
              url: money_form_target,
              type: $this.attr('method'),
              data: $this.serialize(),
              success: function(response_alter) {
                $this.find('#money_form_cancel').trigger( "click" );  //Transfer done, hide the form...etc
                $('#money_current').load( money_form_target + ' #money_current' ); //refresh all current money amounts which are shown
                handle_response('money', response_alter);
              },
              error: function() {
                alert('ajax error : server might be unreachable, please retry later');
              }
          });
      }
    });

    //Informations change
    $('#info_form_show').on('click', function(e){
        e.preventDefault();
        $('#info_form_log').empty();
        $(this).addClass('hidden');             //using bootstrap classes, if personal css display none then use: .hide() and .show() ok
        $('#info_data').addClass('hidden');
        $('#info_password').addClass('hidden');
        $('#info_form').removeClass('hidden');
    });

    $('#info_form_cancel').on('click', function(e){
        e.preventDefault();
        $('#info_form_log').empty();
        $('#info_form_show').removeClass('hidden');
        $('#info_form').addClass('hidden');
        $('#info_data').removeClass('hidden');
        $('#info_password').removeClass('hidden');
    });

    $('#info_form').on('submit', function(e) {
        e.preventDefault();

        var $this = $(this);  //buffered : jQuery Object from the form

        var info_form_target = $this.attr('action');

        if( validate_info() ) {
          $.ajax({
              url: info_form_target,
              type: $this.attr('method'),
              data: $this.serialize(),
              success: function(response_alter) {
                $this.find('#info_form_cancel').trigger( "click" );  //Change done, hide the form...etc
                $('#info_data').load( info_form_target + ' #info_data' ); //Refresh current money amount shown
                handle_response('info', response_alter);
              },
              error: function() {
                alert('ajax error : server might be unreachable, please retry later');
              }
          });
        }
      });


    //Informations password change
    $('#info_password_form_show').on('click', function(e){
        e.preventDefault();
        $('#info_password_form_log').empty();
        $(this).addClass('hidden');             //using bootstrap classes, if personal css display none then use: .hide() and .show() ok
        $('#info_password_data').addClass('hidden');
        $('#info').addClass('hidden');
        $('#info_password_form').removeClass('hidden');
    });

    $('#info_password_form_cancel').on('click', function(e){
        e.preventDefault();
        $('#info_password_form_log').empty();

        $('#info_password_form_show').removeClass('hidden');
        $('#info_password_form').addClass('hidden');
        $('#info_password_data').removeClass('hidden');
        $('#info').removeClass('hidden');
    });

    $('#info_password_form').on('submit', function(e) {
        e.preventDefault();

        var $this = $(this); // buffered : jQuery Object from the form
        var info_password_form_target = $this.attr('action');

        if (validate_info_password()) {
          $.ajax({
            url: info_password_form_target,
            type: $this.attr('method'),
            data: $this.serialize(),
            success: function(response_alter) {
                $this.find('#info_password_form_cancel').trigger("click"); //Change done, hide the form...etc     //ToDo : better design maybe do manual refresh jquery post custom
                handle_response('info_password', response_alter);
            },
            error: function() {
                alert('ajax error : server might be unreachable, please retry later');
            }
          });
        }
    });

});
