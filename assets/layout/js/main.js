/*
Documento JS
Autor: Weslei Silveira - www.wesleisilveira.com.br
Data: 14/06/2020
*/
var SocialBase = ( function () {

  'use strict';

  /* ------------------------------------------------------------------------------- */
  /*  Private Functions & Variables
  /* ------------------------------------------------------------------------------- */

  var sb_sidebar = function () {

    var sidebar = $('#sidebar');

    if ( sidebar.length > 0 ) {

      sidebar.on( 'click', 'a', function(e) {
        e.preventDefault();
        SocialBase.sb_scrool( $(this).attr('href'), -20 );
      });

      $('body').scrollspy({ target: '#sidebar', offset: 70 });

    }

  };

  var sb_slider = function () {

    if ( typeof $.fn.slick !== 'undefined' ) {

      var features_slider = $('.features-slider');

      if ( features_slider.length > 0 ) {

        features_slider.each( function () {

          $(this).slick({
            dots: true,
            fade: true,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            nextArrow: $(this).parents('.tab-pane').find('.slick-next'),
    				prevArrow: $(this).parents('.tab-pane').find('.slick-prev'),
            responsive: [
              {
                breakpoint: 480,
                settings: {
                  dots: false
                }
              }
            ]
          });

          $(this).on( 'beforeChange', function ( event, slick, currentSlide, nextSlide ) {
            var next = ( nextSlide ? nextSlide : 0 ) + 1;
            $(this).parents('.tab-pane').find('.slick-count').html( ( next < 9 ? '0'+next : next ) );
          });

        });

        $('.features a[data-toggle="tab"]').on( 'shown.bs.tab', function () {
          features_slider.slick('refresh');
        });

      }

      var clients_slider = $('.clients-slider');

      if ( clients_slider.length > 0 ) {

        clients_slider.slick({
          arrows: false,
          infinite: true,
          autoplay: true,
          slidesToShow: 5,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 3
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1
              }
            }
          ]
        });

      }

      var overview_slider = $('.overview-slider');

      if ( overview_slider.length > 0 ) {

        overview_slider.slick({
          arrows: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 3000,
          speed: 500,
          fade: true,
          cssEase: 'linear'
        });

      }


    }

  };

  var sb_navigation = function () {

    var navigation = $('.navigation');

    if ( navigation.length > 0 ) {

      $(window).on( 'load scroll', function () {
        var height = $(this).scrollTop(),
            offset = $('header').outerHeight(true) + $('.hero').outerHeight(true) - 100;
        if ( height > offset ) {
          navigation.slideDown('fast');
        } else {
          navigation.slideUp('fast');
        }
      });

      $('body').scrollspy({ target: '#navigation', offset: 180 });

      navigation.on( 'click', '.nav-item:not(:last-child) > a', function (e) {

        e.preventDefault();

        var target = $(this).attr('href'),
            offset = -70;

        if ( target === '#funcionalidades' ) {
          offset = -150;
        }

        SocialBase.sb_scrool( target, offset );

        if ( SocialBase.sb_mobile() ) {
          $('.navbar-toggler').trigger('click');
        }

      });

    }

  };

  var sb_instagram = function () {

    var culture = $('.culture'),
        culture_slider = $('.culture-slider');

    if ( culture.length > 0 ) {

      $.getJSON( 'https://www.instagram.com/socialbasebr/?__a=1', ( data ) => {

          let media = data.graphql.user.edge_owner_to_timeline_media.edges;

          if ( media.length == 0 ) {
            console.log('Nenhuma postagem deste usuário.');
            return;
          }

          media.forEach( ( post ) => {
            post = post.node;
            culture_slider.append('<figure class="col"><a href="https://www.instagram.com/p/'+post.shortcode+'/" target="_blank"><img src="'+post.display_url+'" class="img-fluid" alt="'+post.accessibility_caption+'" /></a></figure>');
          });

          culture_slider.slick({
            arrows: false,
            centerMode: true,
            centerPadding: '90px',
            infinite : true,
            slidesToShow : 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
              {
                breakpoint: 1400,
                settings: {
                  centerPadding: '40px',
                  slidesToShow: 3
                }
              },
              {
                breakpoint: 1200,
                settings: {
                  centerPadding: '40px',
                  slidesToShow: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  centerPadding: '0px',
                  slidesToShow: 1
                }
              }
            ]
          });

          culture.slideDown('fast');

      }).fail( function () {
        console.log('Nome de usuário inválido ou uma conta privada.');
      });

    }

  };

  var sb_register = {

    init: function () {

      var form_email = $('.form-email');

      if ( form_email.length > 0 ) {
        sb_register.validator( form_email );
      }

		},

    validator: function ( form ) {

      form.each( function () {

        $(this).validate({
          errorPlacement: function ( error, element ) {
            if ( element.parent().hasClass('input-group') && !SocialBase.sb_mobile() ) {
              error.insertAfter( element.parent() );
            } else {
              error.insertAfter( element );
            }
          },
          rules: {
            'email': {
              required: true,
              email: true,
            }
          },
          messages: {
            'email': {
              required: 'Informe seu e-mail'
            }
          },
          submitHandler: sb_register.submit
        });

      });

    },

    submit: function ( form ) {

      var form_email = $(form),
          form_button = form_email.find('.btn').text();

      $.ajax({
				type : 'POST',
				url : site.url+'/template-parts/global/actions/send-trial.php',
        data : form_email.serialize(),
		    beforeSend: function () {
          form_email.find('.form-control').attr( 'readonly', true );
          form_email.find('.btn').prop( 'disabled', true ).html( 'Registrando...' );
        },
		    success: function ( data ) {
          if ( data == 'success' ) {
            form_email.unbind().submit();
          } else {
            form_email.validate().showErrors({ 'email' : 'Desculpe, um erro ocorreu no envio do seu cadastro, por favor tente novamente' });
          }
        },
		    complete: function () {
          form_email.find('.form-control').attr( 'readonly', false );
          form_email.find('.btn').prop( 'disabled', false ).html( form_button );
        }
			});

    }

  };

  return {

    /* ------------------------------------------------------------------------------- */
    /*  Initiate Functions
    /* ------------------------------------------------------------------------------- */

    init: function () {
      sb_sidebar();
      sb_slider();
      sb_navigation();
      sb_instagram();
      sb_register.init();
      SocialBase.sb_video.init();
    },

    /* ------------------------------------------------------------------------------- */
    /*  Public Functions
    /* ------------------------------------------------------------------------------- */

    sb_mobile: function () {

      var viewportWidth = $(window).width();

      if ( viewportWidth <= 768 ) {
        return true;
      } else {
        return false;
      }

    },

    sb_scrool: function ( anchor, offset = 0 ) {

      if ( $(anchor).length > 0 ) {

        $('html,body').animate({
          scrollTop: $(anchor).offset().top + parseInt(offset)
        }, 500);

      }

    },

    sb_video: {

      init: function () {

        $('[data-video]').on( 'click', function () {
          var video_id = $(this).attr('data-video');
          SocialBase.sb_video.open( video_id )
        });

      },

      open: function ( video_id = null ) {

        var modal_video = $('.modal-video');

        if ( modal_video.length === 0 ) {

          var modal = '';

          modal+= '<div class="modal fade modal-video" data-backdrop="static" data-keyboard="false" aria-hidden="true">';
          modal+= ' <div class="modal-dialog modal-lg">';
          modal+= '   <div class="modal-content">';
          modal+= '     <div class="modal-header">';
          modal+= '       <button type="button" class="close" data-dismiss="modal">';
          modal+= '         <span aria-hidden="true">&times;</span>';
          modal+= '       </button>';
          modal+= '     </div>';
          modal+= '     <div class="modal-body"></div>';
          modal+= '   </div>';
          modal+= ' </div>';
          modal+= '</div>';

          $('body').append( modal );

          modal_video = $('.modal-video');

          modal_video.on( 'hidden.bs.modal', function () {
            modal_video.find('.modal-body').html('');
          });

        }

        modal_video.find('.modal-body').html('<div class="modal-embed"><iframe src="//www.youtube.com/embed/'+( video_id === null ? 'C0DPdy98e4c' : video_id )+'?modestbranding=0&autohide=1&autoplay=1&showinfo=0&controls=1" allowfullscreen=""></iframe></div>');
        modal_video.modal('show');

      }

    },

  };

}());

// Init Module
$( function () {
  SocialBase.init();
});
