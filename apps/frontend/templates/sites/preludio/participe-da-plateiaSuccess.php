<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/contato.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/<?php echo $section->Site->getSlug() ?>.css" type="text/css" />

<?php use_helper('I18N', 'Date') ?>
<?php include_partial_from_folder('blocks', 'global/menu', array('channels' => $channels, 'live' => $live, 'editorials' => $editorials, 'site' => $site, 'mainSite' => $mainSite, 'coming' => $coming, 'important' => $important)) ?>

<style>
table, td, th, tfoot {border:solid 1px #000; padding:5px;text-align:left}
</style>

  <!--  CAPA SITE -->
  <div id="capa-site">
    
    <?php if(isset($displays["alerta"])) include_partial_from_folder('blocks','global/breakingnews', array('displays' => $displays["alerta"])) ?>
    
    <!-- BARRA SITE -->
      <div id="barra-site">
        <div class="topo-programa">
          <?php if(isset($program) && $program->id > 0): ?>
          <h2>
            <a href="<?php echo $program->retriveUrl() ?>">
              <img src="http://midia.cmais.com.br/programs/<?php echo $program->getImageThumb() ?>" alt="<?php echo $program->getTitle() ?>" title="<?php echo $program->getTitle() ?>" />
            </a>
          </h2>
          <?php endif; ?>
          
         <!-- curtir -->

                <?php if(isset($program) && $program->id > 0): ?>
                <?php include_partial_from_folder('blocks','global/like', array('site' => $site, 'uri' => $uri, 'program' => $program)) ?>
                <?php endif; ?>

          <!-- /curtir -->
                    
                <?php if(isset($program) && $program->id > 0): ?>
                <!-- horario -->
                <div id="horario">
                  <p><?php echo html_entity_decode($program->getSchedule()) ?></p>
                </div>
                <!-- /horario -->
                <?php endif; ?>
            </div>

        <!-- box-topo -->

        <div class="box-topo grid3">
          <?php include_partial_from_folder('blocks','global/sections-menu', array('siteSections' => $siteSections)) ?>
          
          <?php if(!in_array(strtolower($section->getSlug()), array('home','homepage','home-page','index'))): ?>
          <div class="navegacao txt-10">
            <a href="../" title="Home">Home</a>
            <span>&gt;</span>
            <a href="<?php echo $section->retriveUrl()?>" title="<?php echo $section->getTitle()?>"><?php echo $section->getTitle()?></a>
          </div>
          <?php endif; ?>
        </div>

        <!-- /box-topo -->
        
      </div>
      <!-- /BARRA SITE -->
      <!-- MIOLO -->
      <div id="miolo">
        <!-- BOX LATERAL -->
        <?php include_partial_from_folder('blocks','global/shortcuts') ?>
        <!-- BOX LATERAL -->
        <!-- CONTEUDO PAGINA -->
        <div id="conteudo-pagina">
          <!-- CAPA -->
          <div class="capa grid3">
            <h3 class="tit-pagina grid3"><?php echo $section->getTitle() ?></h3>
            <!-- ESQUERDA -->
            <div id="esquerda" class="grid2">
              <div class="contato contatoSrBrasil grid2">
                <!-- <p class="titulos">Lorem Ipsum has been the industry's standard since the 1500s</p> -->
                <p style="margin-bottom:20px;"><?php echo $section->getDescription()?></p>
                                    <div class="msgErro" style="display:none">
                                      <span class="alerta"></span>
                                        <div class="boxMsg">
                                        <p class="aviso">Sua mensagem não pode ser enviada.</p>
                      <p>Confirme se todos os campos foram preenchidos corretamente e verifique seus dados. Você pode te                                              resquecido de preencher algum campo ou errado alguma informação.</p>
                                      </div>
                                        <hr />
                                    </div>
                  <div class="msgErro" style="display:none">
                    <span class="alerta"></span>
                    <div class="boxMsg">
                      <p class="aviso">Sua mensagem não pode ser enviada.</p>
                      <p>Confirme se todos os campos foram preenchidos corretamente e verifique seus dados. Você pode ter esquecido de preencher algum campo ou errado alguma informação.</p>
                    </div>
                    <hr />
                  </div>
                  <div class="msgAcerto" style="display:none">
                    <span class="alerta"></span>
                    <div class="boxMsg">
                      <p class="aviso">Mensagem enviada com sucesso!</p>
                      <p>Obrigado por entrar em contato com nosso programa. Em breve retornaremos sua mensagem.</p>
                    </div>
                    <hr />
                  </div>
                  <div class="linha t1">
                    <p>Prelúdio, o show de calouros de música clássica da TV brasileira, está de volta!<br>
											O programa une a música erudita ao tradicional formato de show de calouros: instrumentistas e cantores têm a oportunidade de apresentar seu talento como solista de uma orquestra profissional regida pelo maestro e diretor artístico Júlio Medaglia.<br><br>
											 
											Venha participar da plateia! Confira abaixo as datas:<br> 
										</p>
											<table border="2">
											<tr>
												<td>1ª e 2ª eliminatórias</td>
												<td>21 de junho (sábado) – Theatro São Pedro</td>
											</tr>
											<tr>
												<td> 3ª e 4ª eliminatórias</td>
												<td>27 de julho (domingo) – Theatro São Pedro </td>
											</tr>
											<tr>
												<td> 5ª e 6ª eliminatórias</td>
												<td>23 de agosto (sábado) – Theatro São Pedro</td>
											</tr>
											<tr>
												<td>1ª e 2ª semifinais</td>
												<td>18 de outubro (sábado) – Theatro São Pedro</td>
											</tr>
											<tr>
												<td> Final</td>
												<td>30 de novembro (domingo) – Sala SP </td>
											</tr>
											</table>
											<br><br>
											<p>
											<b>Endereços:</b><br>
											<b>Theatro São Pedro:</b> Rua Albuquerque Lins, 207 | Campos Elíseos |São Paulo-SP| CEP: 01152-000<br>
											<b>Sala São Paulo:</b> Praça Júlio Prestes, nº 16 | Luz | São Paulo-SP| CEP 01218-020
											</p>
 											
                    
                  </div>                  
                  <form id="form-contato" method="post" action="http://app.cmais.com.br/index.php/<?php echo $program->Channel->getSlug()?>/<?php echo $section->Site->getSlug()?>/<?php echo $section->getSlug()?>">
                  <!-- <input type="hidden" name="email" value="<?php echo $section->Site->getContactEmail() ?>"> -->
                  <div class="linha t1">
                    <label>nome</label>
                    <input type="text" name="nome" id="nome" />
                  </div>
                  <div class="linha t2">
                    <label>Telefone</label>
                    <input type="text" name="telefone" id="telefone" />
                  </div>
                  <div class="linha t3">
                    <label>email</label>
                    <input type="text" name="email" id="email" />
                  </div>
                  <div class="linha t1">
                    <label>cidade</label>
                    <input type="text" name="cidade" id="cidade" />
                  </div>
                  <div class="linha">
                    <label>estado</label>
                                        <br />
                    <select class="estado required" id="estado">
                                            <option value="Acre">AC</option>
                                            <option value="Alagoas">AL</option>
                                            <option value="Amazonas">AM</option>
                                            <option value="Amapá">AP</option>
                                            <option value="Bahia">BA</option>
                                            <option value="Ceará">CE</option>
                                            <option value="Distrito Federal">DF</option>
                                            <option value="Espirito Santo">ES</option>
                                            <option value="Goiás">GO</option>
                                            <option value="Maranhão">MA</option>
                                            <option value="Minas Gerais">MG</option>
                                            <option value="Mato Grosso do Sul">MS</option>
                                            <option value="Mato Grosso">MT</option>
                                            <option value="Pará">PA</option>
                                            <option value="Paraíba">PB</option>
                                            <option value="Pernambuco">PE</option>
                                            <option value="Piauí">PI</option>
                                            <option value="Paraná">PR</option>
                                            <option value="Rio de Janeiro">RJ</option>
                                            <option value="Rio Grande do Norte">RN</option>
                                            <option value="Rondônia">RO</option>
                                            <option value="Roraima">RR</option>
                                            <option value="Rio Grande do Sul">RS</option>
                                            <option value="Santa Catarina">SC</option>
                                            <option value="Sergipe">SE</option>
                                            <option value="São Paulo" selected="selected">SP</option>
                                            <option value="Tocantins">TO</option>
                                        </select>
                  </div>
                  <div class="linha t3">
                    <label>mensagem</label>
                    <textarea name="mensagem" onKeyDown="limitText(this,1000,'#textCounter');"></textarea>
                                        <p class="txt-10"><span id="textCounter">1000</span> caracteres restantes</p>
                  </div>
                  <!--
                  <div class="linha t3 codigo" id="captchaimage">
                    <label for="captcha">Confirma&ccedil;&atilde;o</label>
                    <br />
                    <a class="img" href="javascript:;" onclick="$('#captcha_image').attr('src', 'http://app.cmais.com.br/portal/js/validate/demo/captcha/images/image.php?'+new Date)" id="refreshimg" title="Clique para gerar outro código">
                      <img src="http://app.cmais.com.br/portal/js/validate/demo/captcha/images/image.php?<?php echo time(); ?>" width="132" height="46" alt="Captcha image" id="captcha_image" />
                    </a>
                    <label class="msg" for="captcha">Digite no campo abaixo os caracteres que voc&ecirc; v&ecirc; na imagem:</label>
                    <input class="caracteres" type="text" maxlength="6" name="captcha" id="captcha" />
                    <input class="enviar" type="submit" name="enviar" id="enviar" value="enviar mensagem" style="cursor:pointer" />
                    <img src="http://cmais.com.br/portal/images/ajax-loader.gif" alt="enviando..." style="display:none" width="16px" height="16px" id="ajax-loader" />
                  </div>
                  -->
                  <div class="linha t3 codigo" id="captchaimage">
                    <input class="enviar" type="submit" name="enviar" id="enviar" value="enviar mensagem" style="cursor:pointer" />
                    <img src="http://cmais.com.br/portal/images/ajax-loader.gif" alt="enviando..." style="display:none" width="16px" height="16px" id="ajax-loader" />
                  </div>
                    
                </form>
              </div>
            </div>
            <!-- DIREITA -->
            <div id="direita" class="grid1">
             <!-- BOX PUBLICIDADE -->
              <div class="box-publicidade grid1">
               <!-- home-geral300x250 -->
        <script type='text/javascript'>
        GA_googleFillSlot("home-geral300x250");
        </script>
              </div>
              <!-- / BOX PUBLICIDADE -->
            </div>
            <!-- /DIREITA -->
          </div>
          <!-- /CAPA -->
          
          <!-- rodape srbrasil-->
          <?php /*include_partial_from_folder('blocks','global/rodape-srbrasil'); */?>
          <!-- /rodape srbrasil-->
          
        </div>
        <!-- /CONTEUDO PAGINA -->
      </div>
      <!-- /MIOLO -->
    </div>
    <!-- / CAPA SITE -->
    
    <!-- scripts -->
    <script type="text/javascript" src="http://cmais.com.br/portal/js/validate/jquery.validate.js"></script> 
    <script type="text/javascript">
      $(document).ready(function(){
      	$('input#enviar').click(function(){
      	  $(".msgAcerto, .msgErro").hide();
      	});
      	
      	var validator = $('#form-contato').validate({
          submitHandler: function(form){
            form.submit();
          },/*
        var validator = $('#form-contato').validate({
          submitHandler: function(form){
            $.ajax({
              type: "POST",
              dataType: "text",
              data: $("#form-contato").serialize(),
              beforeSend: function(){
                $('input#enviar').attr('disabled','disabled');
                $(".msgAcerto").hide();
                $(".msgErro").hide();
                $('img#ajax-loader').show();
              },
              success: function(data){
              $('input#enviar').removeAttr('disabled');
                window.location.href="#";
                if(data == "1"){
                  $("#form-contato").clearForm();
                  $(".msgAcerto").show();
                  $('img#ajax-loader').hide();
                }
                else {
                  $(".msgErro").show();
                  $('img#ajax-loader').hide();
                }
              }
            });
          },*/
          rules:{
            nome:{
              required: true,
              minlength: 2
            },
            email:{
              required: true,
              email: true
            },
            cidade:{
              required: true,
              minlength: 3
            },
            estado:{
              required: true,
              minlength: 2
            },
            captcha: {
              required: true,
              remote: "http://app.cmais.com.br/portal/js/validate/demo/captcha/process.php"
            }
          },
          messages:{
            nome: "Digite um nome válido. Este campo é obrigatório.",
            email: "Digite um e-mail válido. Este campo é obrigatório.",
            cidade: "Este campo é obrigatório.",
            estado: "Este campo é obrigatório.",
            //captcha: "Digite corretamente o código que está ao lado."
          },
          // set this class to error-labels to indicate valid fields
          success: function(label){
            // set &nbsp; as text for IE
            label.html("&nbsp;").addClass("checked");
          }
        });
        
        //$('#captcha_image').attr('src', 'http://app.cmais.com.br/portal/js/validate/demo/captcha/images/image.php?'+new Date);
        
      });
      
      // Contador de Caracters
      function limitText (limitField, limitNum, textCounter)
      {
        if (limitField.value.length > limitNum)
          limitField.value = limitField.value.substring(0, limitNum);
        else
          $(textCounter).html(limitNum - limitField.value.length);
      }
      function getVar(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++){
          var pair = vars[i].split("=");
          if (pair[0] == variable) {
            return pair[1];
          }
        }
      }
      var success = getVar("success");
      var error = getVar("error");
      if(success == 1){
        $("#form-contato").hide();
        $(".msgAcerto").show();
      }else if(error == 1){
        $("#form-contato").hide();
        $(".msgErro").show();
      }
        </script>
    <!-- scripts //-->
