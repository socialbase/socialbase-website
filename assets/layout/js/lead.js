/*
Documento JS
Autor: Weslei Silveira - www.wesleisilveira.com.br
Data: 29/09/2020
*/
var LeadSB = ( function () {

  'use strict';

  /* ------------------------------------------------------------------------------- */
	/*  Variables
	/* ------------------------------------------------------------------------------- */

	var form_lead = $('#form-lead'),
      form_button = form_lead.find('.btn').text();

  /* ------------------------------------------------------------------------------- */
  /*  Private Functions
  /* ------------------------------------------------------------------------------- */

  var sb_mask = function () {

    if ( typeof $.fn.mask !== 'undefined' ) {

      var phone = $('#lead_phone');

      phone.bind( 'paste', function (e) { e.preventDefault(); } );

      var SPMaskBehavior = function (val) { return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009'; },
        spOptions = {
        onKeyPress : function (val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        },
        clearIfNotMatch : true
      };

      phone.mask( SPMaskBehavior, spOptions );

    }

	};

  var sb_form = function () {

    form_lead.validate({
      onfocusout: false,
      errorPlacement: function ( error, element ) {
        if ( element.is( ':radio' ) )  {
          element.closest('.form-group').append( error );
        } else {
          error.insertAfter( element );
        }
      },
      rules: {
        lead_email: {
          required: true,
          email: true
        },
        lead_name: {
          required: true,
          minlength: 8
        },
        lead_phone: {
          required: true,
          minlength: 15
        },
        lead_sector: {
          required: true
        },
        lead_help: {
          required: true
        }
      },
      messages: {
        lead_email: {
          required: 'Informe seu e-mail',
          email: 'Informe um e-mail válido'
        },
        lead_name: {
          required: 'Informe seu nome',
          minlength: 'O nome deve ser completo'
        },
        lead_phone: {
          required: 'Informe seu telefone',
          minlength: 'O número deve ser completo'
        },
        lead_sector: {
          required: 'Informe o setor que você atua na empresa'
        },
        lead_help: {
          required: 'Informe como podemos ajudar a sua empresa'
        }
      },
      submitHandler: sb_submit.lead
    });

	};

	var sb_submit = {

		lead: function () {

			$.ajax({
				type : 'POST',
				url : site.url+'/template-parts/global/actions/send-lead.php',
        data : form_lead.serialize(),
		    beforeSend: function () {
          form_lead.find('.form-control,.form-check-input').attr( 'readonly', true );
          form_lead.find('.btn').prop( 'disabled', true ).html( 'Registrando...' );
        },
		    success: sb_return.lead,
		    error: sb_return.error,
		    complete: function () {
          form_lead.find('.form-control,.form-check-input').attr( 'readonly', false );
          form_lead.find('.btn').prop( 'disabled', false ).html( form_button );
        }
			});

		},

	};

  var sb_return = {

		lead: function ( data ) {

      if ( data == 'success' ) {
        $('#modal-lead').modal( 'hide' );
        SocialBase.sb_video.open( 'GFmZ-nE8yD8' )
      } else {
        sb_return.error();
      }

    },

		error: function () {
      form_lead.validate().showErrors({ 'lead_email' : 'Desculpe, um erro ocorreu no envio do seu cadastro, por favor tente novamente' });
    }

	};

  return {

    /* ------------------------------------------------------------------------------- */
    /*  Initiate Functions
    /* ------------------------------------------------------------------------------- */

    init: function () {
      sb_mask();
      sb_form();
      checkDevice();
    }

  };

}());

// Init Module
$( function () {
  LeadSB.init();
});

function checkDevice() {
  if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
    $('#modal_tech').val('Mobile');
  } else {
    $('#modal_tech').val('Desktop');
  }
};