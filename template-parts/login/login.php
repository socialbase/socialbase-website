<section class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 text-center">

        <a href="<?= SITE_URL; ?>"><img src="<?= ASSETS_IMAGES_URI; ?>/logos/socialbase-logo.svg" alt="SocialBase" /></a>

        <div class="tab-content">

          <div class="tab-pane fade show active" id="url-account">

            <h2>Vamos colaborar para tornar a sua comunicação produtiva?</h2>

            <form id="form-account" autocomplete="off">
              <fieldset>

                <div class="form-group">
        					<label>Insira a URL da sua empresa:</label>
        					<input type="url" name="url" class="form-control" placeholder="suaempresa.socialbase.com.br" />
        				</div>

                <div class="form-group">
                  <button type="submit" class="btn btn-blue">Próximo</button>
                </div>

                <div class="form-group">
                  <small>Não sabe qual sua URL? <a href="#search-url" data-toggle="tab" rel="nofollow">Descubra como é fácil.</a></small>
                  <small>Ainda não tem uma conta? <a href="/sobre">Conheça a SocialBase.</a></small>
                </div>

              </fieldset>
            </form>

          </div>

          <div class="tab-pane fade" id="login-account">

            <h2>Entrar em Nerau</h2>
            <small>nerau.socialbase.com.br</small>

            <form id="form-login" autocomplete="off">
              <fieldset>

                <div class="form-group">
        					<label>E-mail</label>
        					<input type="email" name="email" class="form-control" placeholder="emailcorporativo@empresa.com.br" />
        				</div>

                <div class="form-group">
        					<label>Senha</label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" />
                    <div class="input-group-append">
                      <button type="button" class="btn btn-password">&nbsp;</button>
                    </div>
                  </div>
        				</div>

                <div class="form-group">
                  <button type="submit" class="btn btn-blue">Entrar</button>
                </div>

                <div class="form-group">
                  <small>Esqueceu sua senha? <a href="#lost-password" data-toggle="tab" rel="nofollow">A gente te ajuda.</a></small>
                  <small>Escolheu a empresa errada? <a href="#url-account" data-toggle="tab" rel="nofollow">Selecione a URL correta.</a></small>
                </div>

              </fieldset>
            </form>

          </div>

          <div class="tab-pane fade" id="search-url">

            <h2>Encontre a URL <br class="d-none d-sm-block" /> da sua empresa</h2>
            <p>Digite seu e-mail corporativo abaixo, e nós enviaremos a URL da sua área de trabalho.</p>

            <form id="form-url" autocomplete="off">
              <fieldset>

                <div class="form-group">
        					<label>E-mail</label>
        					<input type="email" name="email" class="form-control" placeholder="emailcorporativo@empresa.com.br" />
        				</div>

                <div class="form-group">
                  <button type="submit" class="btn btn-blue">Recuperar</button>
                </div>

                <div class="form-group">
                  <small>Ainda não tem uma conta? <a href="/sobre">Conheça a SocialBase.</a></small>
                </div>

              </fieldset>
            </form>

          </div>

          <div class="tab-pane fade" id="lost-password">

            <h2>Esqueceu sua senha?</h2>
            <p>Digite seu e-mail corporativo abaixo, e nós enviaremos um link para você escolher sua nova senha.</p>

            <form id="form-password" autocomplete="off">
              <fieldset>

                <div class="form-group">
        					<label>E-mail</label>
        					<input type="email" name="email" class="form-control" placeholder="emailcorporativo@empresa.com.br" />
        				</div>

                <div class="form-group">
                  <button type="submit" class="btn btn-blue">Recuperar</button>
                </div>

                <div class="form-group">
                  <small>Escolheu a empresa errada? <a href="#url-account" data-toggle="tab" rel="nofollow">Selecione a URL correta.</a></small>
                </div>

              </fieldset>
            </form>

          </div>

        </div>

      </div>
    </div>
  </div>
</section>
