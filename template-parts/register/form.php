<div class="col-lg-5">

  <a href="<?= SITE_URL; ?>"><img src="<?= ASSETS_IMAGES_URI; ?>/logos/socialbase-logo.svg" alt="SocialBase" /></a>

  <div class="card" id="form-card">

    <h1>É hora de fazer sua <br class="d-none d-sm-block" /> comunicação acontecer.</h1>
    <p>Preencha os campos para começar seu teste.</p>

    <ul class="nav flex-column">
      <li><a href="#step1" class="active" data-toggle="tab" rel="nofollow">&nbsp;</a></li>
      <li><a href="#step2" data-toggle="tab" rel="nofollow">&nbsp;</a></li>
      <li><a href="#step3" data-toggle="tab" rel="nofollow">&nbsp;</a></li>
    </ul>

    <form id="form-register" autocomplete="off">
      <fieldset>
        <input type="text" hidden name="conversion_identifier" id="conversion_identifier" value="Formulário de Trial - Site Novo" class="form-control" />
        <input type="text" hidden name="order_type" id="order_type" value="Pedido de Trial" class="form-control" />
        <input type="text" hidden name="tech" id="register_tech">

        <div class="tab-content">

          <div class="tab-pane fade show active" id="step1">
            <div class="form-group">
    					<label for="name">Nome Completo</label>
    					<input type="text" name="name" id="name" class="form-control" />
    				</div>

            <div class="form-group">
    					<label for="phone">Telefone</label>
    					<input type="tel" name="phone" id="phone" class="form-control" />
    				</div>

            <div class="form-group">
    					<label for="email">E-mail</label>
    					<input type="email" name="email" id="email" value="<?= ( !empty( $_REQUEST['email'] ) ? $_REQUEST['email'] : '' ); ?>" class="form-control" />
    				</div>

            <div class="form-group">
              <label for="password">Senha</label>
              <div class="input-group">
                <input type="password" placeholder="Mínimo 8 dígitos" name="password" id="password" class="form-control" />
                <div class="input-group-append">
                  <button type="button" class="btn btn-password">&nbsp;</button>
                </div>
              </div>
            </div>

          </div>

          <div class="tab-pane fade" id="step2">

            <div class="form-group">
    					<label for="company_employees">Quantos funcionários há na empresa?</label>
    					<select name="company_employees" id="company_employees" class="form-control">
    						<option value="" selected="selected" disabled="disabled" hidden="hidden">&nbsp;</option>
                <option value="Menos de 50">Menos de 50</option>
                <option value="De 51 a 100">De 51 a 100</option>
                <option value="De 101 a 300">De 101 a 300</option>
                <option value="De 301 a 500">De 301 a 500</option>
                <option value="De 501 a 1000">De 501 a 1000</option>
                <option value="De 1001 a 2000">De 1001 a 2000</option>
                <option value="De 2001 a 5000">De 2001 a 5000</option>
                <option value="Mais de 5000">Mais de 5000</option>
    					</select>
    				</div>

            <div class="form-group">
    					<label for="company_office">Qual o seu cargo?</label>
    					<select name="company_office" id="company_office" class="form-control form-select">
    						<option value="" selected="selected" disabled="disabled" hidden="hidden">&nbsp;</option>
                <option value="CEO/Sócio">CEO/Sócio</option>
                <option value="Diretor/VP">Diretor/VP</option>
                <option value="Coordenador/Supervisor">Coordenador/Supervisor</option>
                <option value="Gerente/Líder">Gerente/Líder</option>
                <option value="Analista">Analista</option>
                <option value="Assistente">Assistente</option>
                <option value="Estudante/Estagiário">Estudante/Estagiário</option>
                <option value="Professor">Professor</option>
                <option value="Consultor">Consultor</option>
    					</select>
    				</div>

            <div class="form-group">
    					<label for="company_sector">Em qual setor da empresa você atua?</label>
    					<select name="company_sector" id="company_sector" class="form-control">
    						<option value="" selected="selected" disabled="disabled" hidden="hidden">&nbsp;</option>
                <option value="Administrativo/Financeiro">Administrativo/Financeiro</option>
                <option value="Recursos Humanos">Recursos Humanos</option>
                <option value="Comunicação">Comunicação</option>
                <option value="Marketing">Marketing</option>
                <option value="Vendas/Comercial">Vendas/Comercial</option>
                <option value="Logística">Logística</option>
                <option value="Compras">Compras</option>
                <option value="TI e Infra">TI e Infra</option>
                <option value="Desenvolvimento">Desenvolvimento</option>
                <option value="Gestão de Projetos">Gestão de Projetos</option>
    					</select>
    				</div>

            <div class="form-group">
    					<label for="company_certificate">Sua empresa tem certificado GPTW?</label>
    					<select name="company_certificate" id="company_certificate" class="form-control">
    						<option value="" selected="selected" disabled="disabled" hidden="hidden">&nbsp;</option>
                <option value="Sim, foi certificada mais de uma vez">Sim, foi certificada mais de uma vez</option>
                <option value="Sim, foi certificada uma vez">Sim, foi certificada uma vez</option>
                <option value="Não, mas tem interesse">Não, mas tem interesse</option>
                <option value="Não, e não tem interesse">Não, e não tem interesse</option>
    					</select>
    				</div>

          </div>

          <div class="tab-pane fade" id="step3">

            <div class="form-group">
              <label for="company">Empresa</label>
              <input type="text" name="company" id="company" class="form-control" />
            </div>

            <div class="form-group">
    					<label for="company_url">Escolha a URL para sua empresa</label>
              <div class="input-group">
                <input type="text" name="company_url" id="company_url" class="form-control" />
                <div class="input-group-append"><span class="input-group-text">.socialbase.com.br</span></div>
            </div>
    				</div>

            <div class="form-group">
    					<label for="company_invite">Convide colaboradores para fazer <br /> parte da sua equipe na SocialBase</label>
    					<input type="text" name="company_invite" id="company_invite" class="form-control" />
              <small class="form-text">Separe os e-mails usando uma vírgula.</small>
    				</div>

          </div>

        </div>

        <div class="form-group" id="form-buttons">
          <button type="button" id="back" style="opacity: 0" class="btn btn-link btn-prev">Voltar</button>
          <button type="submit" class="btn btn-blue btn-next float-right">Continuar</button>
        </div>

      </fieldset>
    </form>

  </div>

  <div class="card" style="display: none" id="response-card">
    <h1>Tudo certo para você começar!</h1>
    <p>Agora você tem acesso a tudo que precisa para construir uma comunicação mais simples, transparente e organizada para que todos na sua empresa trabalhem melhor e mais felizes.</p>
    <hr>
    <div class="infos-box">
      <h1 class="infos">INFORMAÇÕES DE LOGIN</h1>
      <p class="response-infos">EMAIL: <span class="purple" id="response-email"></span></p>
      <p class="response-infos">SENHA: <span class="purple">como escolhida anteriormente</span></p>
    </div>
    <hr>

    <div id="message">
      <p>Por favor aguarde, estamos preparando a melhor expêriencia em comunicação interna.</p>
      <div class="border" id="bar-border" style="border-radius: 20px; border: 1px solid #ccc;">
        <div class="bar" id="bar" style="border-radius: 20px; height: 30px; width: 1%; background-color: #26a0f5"></div>
      </div>
    </div>

    <a id="response-url-id" type="button" target="_blank" style="display: none" class="btn btn-blue">ACESSE A PLATAFORMA</a>
  </div>

</div>

<style>
  /* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url('../../assets/layout/fonts/montserrat/JTUSjIg1_i6t8kCHKm459WRhyyTh89ZNpQ.woff2') format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url('../../assets/layout/fonts/montserrat/JTUSjIg1_i6t8kCHKm459W1hyyTh89ZNpQ.woff2') format('woff2');
  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url('../../assets/layout/fonts/montserrat/JTUSjIg1_i6t8kCHKm459WZhyyTh89ZNpQ.woff2') format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url('../../assets/layout/fonts/montserrat/JTUSjIg1_i6t8kCHKm459WdhyyTh89ZNpQ.woff2') format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url('../../assets/layout/fonts/montserrat/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
#response-card hr {
  margin-bottom: 40px;
}

#message {
  padding-bottom: 40px;
}

#response-card hr {
  opacity: 0.4;
}

.infos-box {
  padding-bottom: 10px;
}
#response-card .infos {
  letter-spacing: 0.09em;
  font-size: 16px;
  font-family: 'Montserrat', sans-serif !important;
  font-weight: 700;
}

#response-card .response-infos {
  font-size: 12px;
  font-weight: 700!important;
  color: #38416F !important;
  letter-spacing: 0.09em;
}

#response-card span {
  font-size: 16px;
  font-weight: 100;
  font-family: 'Montserrat', sans-serif;
  color: #5A2ADF;
  margin-left: 10px;
}

#response-card .btn {
  width: 100%;
  max-width: 100% !important;
  margin-bottom: 30px;
}

#response-card {
  font-family: 'Montserrat', sans-serif !important;
}

#password-error {
  position: absolute;
  top: 40px;
  right: 25px;
}

#form-buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 60px;
}
</style>