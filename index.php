<?php

  require( 'functions.php' );

  get_header();

  get_template_part( 'home/hero' );

  get_template_part( 'home/navigation' );

  get_template_part( 'home/overview' );

  get_template_part( 'home/features' );

  get_register( [ 'form_id' => 'form-email-center', 'form_title' => '30 dias de teste para fazer <br class="d-none d-sm-block" /> sua comunicação acontecer.', 'form_subtitle' => 'Comece agora, personalize quando quiser.', 'form_link_contact' => 'sim', 'form_bg' => 'bg-alternate' ] );

  get_template_part( 'home/compare' );

  get_template_part( 'home/mobile' );

  get_template_part( 'home/clients' );

  get_template_part( 'home/testimonials' );

  get_template_part( 'home/security' );

  get_register( [ 'form_id' => 'form-email-footer' ] );

  get_template_part( 'global/modal-lead' );

  get_footer();

?>
