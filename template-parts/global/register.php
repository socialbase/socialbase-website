<section class="wrapper register <?= ( !empty( $form_bg ) ? $form_bg : '' ); ?>">
  <div class="container">
    <div class="row">

      <div class="col-12 text-center">
        <p class="subtitle">Teste grátis</p>
        <h2><?= ( !empty( $form_title ) ? $form_title : 'Vamos começar seu teste?' ); ?></h2>
        <p><?= ( !empty( $form_subtitle ) ? $form_subtitle : 'Sem enrolação, comece agora.' ); ?></p>
      </div>

      <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3 text-center">
        <form name="<?= ( !empty( $form_id ) ? $form_id : 'form-email' ); ?>" id="<?= ( !empty( $form_id ) ? $form_id : 'form-email' ); ?>" class="form-email" action="<?= ( !empty( $form_action ) ? $form_action : SITE_URL.'/cadastro' ); ?>" method="POST" autocomplete="off">
          <fieldset>
            <div class="form-group">
              <div class="input-group">
                <input type="email" name="email" value="<?= ( !empty( $_GET['email'] ) ? $_GET['email'] : '' ); ?>" class="form-control" placeholder="<?= ( !empty( $form_text_input ) ? $form_text_input : 'Preencha com seu e-mail corporativo' ); ?>" />
                <button type="submit" name="button" class="btn btn-blue"><?= ( !empty( $form_text_button ) ? $form_text_button : 'Teste a socialbase' ); ?></button>
              </div>
            </div>
          </fieldset>
        </form>
        <?php if ( !empty( $form_link_contact ) ) : ?>
        <a href="https://agendamento.socialbase.com.br/demonstracao" class="btn btn-link btn-sm p-0" target="_blank" rel="noreferrer">Ou fale com um consultor agora mesmo</a>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
