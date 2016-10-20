$(document).ready(function(){

  /*
  ************************************
  Functions : handle, validation...etc
  ************************************
  */

  //Success and Error handling
  function handle_response(form_description, form_object ,json_response) {
    var response = JSON.parse(json_response);
    var log_selector = form_object.parent().parent().nextAll().find('.bet_form_log');
    if (response.success) {                                     //possible to use polymorphic function taking all cases into account : reusable design pattern
      if (form_description == "bet") {
        var success_msg = '<p class="bg-success form_log"> Votre pari a bien été pris en compte! Aller parier à nouveau! </p>';
      }
      else if (form_description == "finish") {
        var success_msg = '<p class="bg-success form_log"> Le match est maintenant terminé ! </p>';
      }

      //Log success
      log_selector.empty().append(success_msg);
      form_object.prevAll('.bet_form_show').addClass('disabled');       //disable both buttons
      form_object.parent().siblings().find('.bet_form_show').addClass('disabled');
    }
    else if (response.error.db) {
      log_selector.empty().append('<p class="bg-warning form_log"> Erreur interne du serveur, votre demande n\'a pas pu être traité, veuillez reessayer plus tard! </p>');
    }
    else if (response.error.money) {
      log_selector.empty().append('<p class="bg-danger form_log"> Vous n\'avez pas suffisament d\'argent sur votre compte, veuillez le recharger! </p>');
    }
  };

  function validate_bet(form_object) {
    var betting_money = form_object.find('.betting_money').val();
    var log_selector = form_object.parent().parent().nextAll().find('.bet_form_log');

    if( betting_money <= 0 )
    {
      $(log_selector).empty().append('<p class="bg-danger form_log">Veuillez entrer un montant correct</p>');
      return false;
    }
    else if ( betting_money >= 50000 ) {
      $(log_selector).empty().append('<p class="bg-warning form_log">Vous pariez considérablement d\'argent, aller vous renseignez à la page Aide concernant l\'addiction au jeu</p>');
      return false;
    }
    return true;
  };

  /*
  ********************************************************************
  Dynamic Logic of the page & AJAX client-server interaction interface
  ********************************************************************
  */

  //Bet_form
  $('.bet_form_show').on('click', function(e){
    e.preventDefault();
    if ($(this).hasClass('disabled') ) {
      //either not authenticated, or already chosen...etc
    }
    else {
      $(this).addClass('hidden');             //using bootstrap classes, if personal css display none then use: .hide() and .show() ok
      $(this).nextAll('.bet_form').removeClass('hidden');
    }
  });

  $( ".bet_form" ).hover(
    function() {},
    function() {
      $( this ).addClass('hidden');
      $(this).prevAll('.bet_form_show').removeClass('hidden');
    }
  );

  $('.bet_form').on('submit', function(e) {
      e.preventDefault();

      var $this = $(this); //buffered : jQuery Object from the form

      var betting_money = $this.find('.betting_money').val();
      var bet_form_target = $this.attr('action');

      if( validate_bet($this) ) {
        $.ajax({
          url: bet_form_target,
          type: $this.attr('method'),
          data: $this.serialize(),
          success: function(response_alter) {
              $this.find('.bet_form').trigger("mouseleave");    //hide the form...etc
              handle_response('bet', $this, response_alter);
          },
          error: function() {
              alert('ajax error : server might be unreachable, please retry later');
          }
        });
      }
  });

  //Finish form
  $('.finish_form').on('submit', function(e) {
      e.preventDefault();

      var $this = $(this); //buffered : jQuery Object from the form

      var finish_form_target = $this.attr('action');

      if(false) {
        //possible to extend with security in mind, here for practical reasons to test the web app anyone can finish an event, no need to be logged in...etc
      }
      else {
        $.ajax({
          url: finish_form_target,
          type: $this.attr('method'),
          data: $this.serialize(),
          success: function(response_alter) {
              $this.addClass('hidden');    //hide the form...etc
              handle_response('finish', $this, response_alter);
          },
          error: function() {
              alert('ajax error : server might be unreachable, please retry later');
          }
        });
      }
  });


});
