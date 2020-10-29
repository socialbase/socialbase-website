<?php

  require( 'functions.php' );

  get_header();

  get_template_part( 'about/hero' );

  get_template_part( 'about/baser' );

  get_template_part( 'about/blog' );

  get_template_part( 'about/culture' );

  get_register( [ 'form_id' => 'form-email-about' ] );

  get_footer();

?>
