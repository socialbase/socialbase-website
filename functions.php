<?php

  /*
  	Theme Name: SocialBase
    Author: Weslei Silveira
  	Author URI: https://wesleisilveira.com.br
    Maintaince: Leonardo de Almeida
    Maintaince URI: https://lewalmeida.com.br
  	Version: 1.0.0
  */

  /* ------------------------------------------------------------------------------- */
  /*  Define URL global ROOT and URI folders
  /* ------------------------------------------------------------------------------- */

  define ( 'SITE_URL', ( $_SERVER['SERVER_NAME'] == 'socialbase.com.br' ? 'https://socialbase.com.br' : 'http://localhost/socialbase-website/' ) );

  define ( 'ASSETS_URI', SITE_URL.'/assets' );

  define ( 'ASSETS_IMAGES_URI', ASSETS_URI.'/layout/images' );

  define ( 'VERSION', '21102020' );

  /* ------------------------------------------------------------------------------- */
	/*  Function to minifier HTML
	/* ------------------------------------------------------------------------------- */

  function minifier( $buffer ) {
    $search = [ '/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/<!--(.|\s)*?-->/' ];
    $replace = [ '>', '<', '\\1' ];
    $buffer = preg_replace( $search, $replace, $buffer );
    return $buffer;
  }

  /* ------------------------------------------------------------------------------- */
	/*  Functions to include template modules
	/* ------------------------------------------------------------------------------- */

  function get_template_part( $slug = '', $arguments = [] ) {
		$located = "template-parts/{$slug}.php";
		if ( file_exists( $located ) ) {
			extract( $arguments );
      ob_start( 'minifier' );
			require( $located );
      ob_end_flush();
		}
	}

  function get_header() {
    get_template_part( 'global/header' );
  }

  function get_footer() {
    get_template_part( 'global/footer' );
  }

  function get_register( $atts = [] ) {
    get_template_part( 'global/register', $atts );
  }

?>
