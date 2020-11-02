<div id="modal-lead" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content pt-20 px-40">

			<div class="modal-header d-block">
        <button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
        <img src="<?= ASSETS_IMAGES_URI; ?>/logos/socialbase-logo.svg" width="120" height="35" alt="SocialBase" />
				<h2 class="mt-20 mb-10">Quer saber mais <br class="d-none d-sm-block" /> sobre a nossa solução?</h2>
				<p class="mb-30">Preencha com seus dados e assista à demonstração.</p>
			</div>

			<div class="modal-body">

        <form id="form-lead" autocomplete="off">
          <fieldset>
            <input type="text" hidden name="conversion_identifier" id="conversion_identifier" value="Formulário de Demonstração - Site Novo" class="form-control" />
            <input type="text" hidden name="order_type" id="order_type" value="Pedido de demonstração" class="form-control" />
            <input type="text" hidden name="tech" id="modal_tech">

            <div class="form-group">
              <label for="lead_email">E-mail</label>
              <input type="email" name="lead_email" id="lead_email" class="form-control" />
            </div>

            <div class="form-group">
              <label for="lead_name">Nome Completo</label>
              <input type="text" name="lead_name" id="lead_name" class="form-control" />
            </div>

            <div class="form-group">
              <label for="lead_phone">Telefone</label>
              <input type="tel" name="lead_phone" id="lead_phone" class="form-control" />
            </div>

            <div class="form-group">
              <label for="lead_sector">Em qual setor da empresa você atua?</label>
              <select name="lead_sector" id="lead_sector" class="form-control select">
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

            <div class="form-group mb-40">
              <label>Como podemos ajudar a sua empresa?</label>

              <div class="form-check my-15">
                <input type="radio" name="lead_help" value="Existem muitos ruídos na comunicação" id="lead_help1" class="form-check-input" />
                <label for="lead_help1" class="form-check-label">Existem muitos ruídos na comunicação</label>
              </div>

              <div class="form-check my-15">
                <input type="radio" name="lead_help" value="Há necessidade de encurtar distâncias" id="lead_help2" class="form-check-input" />
                <label for="lead_help2" class="form-check-label">Há necessidade de encurtar distâncias</label>
              </div>

              <div class="form-check my-15">
                <input type="radio" name="lead_help" value="Falta engajamento dos colaboradores" id="lead_help3" class="form-check-input" />
                <label for="lead_help3" class="form-check-label">Falta engajamento dos colaboradores</label>
              </div>

            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-blue">Assista à demonstração</button>
            </div>

          </fieldset>
        </form>

			</div>

		</div>
    </div>
</div>
