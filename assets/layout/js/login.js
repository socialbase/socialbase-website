/*
Documento JS
Autor: Weslei Silveira - www.wesleisilveira.com.br
Data: 29/09/2020
*/
var LoginSB = ( function () {

  'use strict';

  /* ------------------------------------------------------------------------------- */
	/*  Variables
	/* ------------------------------------------------------------------------------- */

	var form_account   = $('#form-account'),
      form_login     = $('#form-login'),
      form_url       = $('#form-url'),
      form_password  = $('#form-password');

  /* ------------------------------------------------------------------------------- */
  /*  Private Functions
  /* ------------------------------------------------------------------------------- */

  var sb_password = function () {

    var button = $('.btn-password');

    if ( button.length > 0 ) {

      button.on( 'click', function () {

        var input = $('.btn-password').closest('.input-group').find('.form-control');

        if ( input.length > 0 ) {

          if ( $(this).hasClass('visible') ) {
            input.attr( 'type', 'password' );
          } else {
            input.attr( 'type', 'text' );
          }

          $(this).toggleClass('visible');

        }

      });

    }

  };

  var sb_form = function () {

    form_account.validate({
      onfocusout: false,
      rules: {
        url: {
          required: true,
          url: false
        }
      },
      messages: {
        url: {
          required: 'Informe sua URL'
        }
      },
      submitHandler: sb_submit.account
    });

    form_login.validate({
      onfocusout: false,
      rules: {
        url: {
          required: true
        }
      },
      messages: {
        email: {
          required: 'Informe sua URL'
        }
      },
      submitHandler: sb_submit.login
    });

    form_url.validate({
      onfocusout: false,
      rules: {
        url: {
          required: true
        }
      },
      messages: {
        email: {
          required: 'Informe sua URL'
        }
      },
      submitHandler: sb_submit.url
    });

    form_password.validate({
      onfocusout: false,
      rules: {
        url: {
          required: true
        }
      },
      messages: {
        email: {
          required: 'Informe sua URL'
        }
      },
      submitHandler: sb_submit.password
    });

	};

	var sb_submit = {

		account: function () {

			$.ajax({
				type : 'POST',
				url : 'curl.php',
        data : form_account.serialize(),
		    //beforeSend: function () {},
		    success: sb_return.account,
		    error: sb_return.error,
		    //complete: function () {}
			});

		},

    login: function () {},

    url: function () {},

    password: function () {}

	};

  var sb_return = {

		account: function ( data ) {},

    login: function ( data ) {},

    url: function ( data ) {},

    password: function ( data ) {},

		error: function () {}

	};

  return {

    /* ------------------------------------------------------------------------------- */
    /*  Initiate Functions
    /* ------------------------------------------------------------------------------- */

    init: function () {
      sb_password();
      sb_form();
    }

  };

}());

// Init Module
$( function () {
  LoginSB.init();
});
