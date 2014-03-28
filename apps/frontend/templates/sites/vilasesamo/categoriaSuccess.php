<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 8]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/vilasesamo2/internas.css" type="text/css" />

<?php
$noscript = "  <noscript>Desculpe mas no seu navegador não esta habilitado o Javascript, habilite-o e recarregue a página.</noscript>"
?> 

<script>
  $("body").addClass("interna campanhas categorias");
</script>
<?php echo $noscript; ?>

<!-- HEADER -->
<?php include_partial_from_folder('sites/vilasesamo', 'global/menu', array('site' => $site, 'mainSite' => $mainSite, 'section' => $section)) ?>
<!-- /HEADER -->

<!--content-->
<div id="content">
  
  <!--Explicação acessibilidade-->
  <h1 tabindex="0" class="ac-explicacao">
   <?php echo $section->getDescription(); ?>
  </h1>
  
  <!--section -->
  <section id="categoria-box-pais" class="filtro row-fluid pais categorias">
    
    <!--selecione a categoria-->
    <?php
      $sectionCategorias = Doctrine::getTable('Section')->findOneBySiteIdAndSlug($site->getId(),"categorias");
      $allCategories = $sectionCategorias->subsections(); // pega todas as categorias para o usuário poder navegar por elas
    ?>        
    <?php if(isset($allCategories)): ?>
      <?php if(count($allCategories) > 0): ?>
      <div class="btn-group selecao-categoria">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> Selecione a categoria <span class="caret icones-setas icone-cat-abrir"></span> </a>
        <ul class="dropdown-menu">
          <?php foreach($allCategories as $c): ?>
          <li><a href="<?php echo $c->retriveUrl() ?>" title="<?php echo $c->getTitle() ?>"><?php echo $c->getTitle() ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    <?php endif; ?>
    <!--/selecione a categoria-->
      
    <!--container conteudo-->
    <div class="b-amarelo borda-arredonda">
      <h1>
        <?php echo $section->getTitle() ?>
      </h1>
      
      <?php if($section->getIsHomepage() == 1): // A seção filha de "categorias" precisa estar com a opção "is Homepage" marcada para ser considerada especial, tais como "Hábitos Saudáveis" e "Incluir Brincando". ?>
  
       
        <div class="container-campanhas" tabindex="0" aria-label="<?php echo $displays["selo"][1]->Asset->AssetType->getSlug() ?> <?php echo $displays["selo"][1]->getTitle() ?>. Descrição:  <?php echo $displays['destaque-principal'][0]->getDescription() ?>" tabindex="0""> <!-- Conteúdo iframe-->
          <!-- selo -->
          <?php if(isset($displays['selo'])): ?>
            <?php if(count($displays['selo']) > 0): ?>
              <?php if($displays["selo"][1]->retriveImageUrlByImageUsage("original")): ?>
                <img class="" src="<?php echo $displays["selo"][1]->retriveImageUrlByImageUsage("original") ?>" alt="<?php echo $displays["selo"][1]->getTitle() ?>"/>  <!--/Aqui fala o título do vídeo e a descrição-->
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
          <!--/selo-->
          
          
         
          <!--destaque-principal-->
          <?php if(isset($displays['destaque-principal'])): ?>
            <?php if(count($displays['destaque-principal']) > 0): ?>    
              
                <!--video ou imagem-->
                <?php if($displays["destaque-principal"][0]->Asset->AssetType->getSlug() == "video"): ?>
                
                 <!-- Inserindo o player para acessibilidade -->   
                  <div class="asset">
                    <div id="player"></div>
                    <a href="#" class="play" aria-label="Iniciar o vídeo"></a>
                    <a href="#" class="pause" aria-label="Pausar o vídeo"></a>
                    <a href="#" class="stop" aria-label="Parar o vídeo"></a>
                  </div>
                <!--iframe width="300" height="246" src="http://www.youtube.com/embed/<?php echo $displays["destaque-principal"][0]->Asset->AssetVideo->getYoutubeId() ?>?wmode=transparent&rel=0" frameborder="0" allowfullscreen></iframe-->
                
                
                <?php elseif($displays["destaque-principal"][0]->Asset->AssetType->getSlug() == "image"): ?>
                <img tabindex="0" class="img-destaque" src="<?php echo $displays["destaque-principal"][0]->retriveImageUrlByImageUsage("image-3-b") ?>" alt="<?php echo $displays["destaque-principal"][0]->getTitle() ?>" />
                <?php endif; ?>
                <!--/video ou imagem-->
           <?php if($section->getSlug()=="incluir-brincando"):?>
            	<br/>
            	<br/>
             <p>
              INCLUIR BRINCANDO é um projeto voltado para o fortalecimento da consciência sobre o direito do brincar seguro e inclusivo, da diversidade e do estímulo aos hábitos saudáveis, com ênfase na inclusão de crianças com deficiências. 
            </p>
            <p>O projeto é uma iniciativa da TV Cultura e da Sesame Workshop, com o apoio da Fundação MetLife, parceria estratégica do UNICEF e parceria institucional da Associação Laramara, do Instituto Rodrigo Mendes, da Efeito Visual Serigrafia e da Iguale Comunicação de Acessibilidade.</p>
            <p>Conheça melhor o projeto e os conteúdos digitais da Campanha Transmídia e da Coleção Incluir Brincando, clicando nos links abaixo.
            </p>
            <?php elseif($section->getSlug()=="habitos-saudaveis"):?>
              <br/>
              <br/>
              <p>
                O Projeto Hábitos para uma Vida Saudável busca modificar de forma positiva o
                conhecimento e as atitudes das crianças com relação à alimentação saudável,
                à prática de atividades físicas e à saúde sócio-emocional. Todos os conteúdos (vídeos, jogos digitais e atividades)
                foram criados para estimular o aprendizado sobre os hábitos saudáveis por meio do uso de recursos e tecnologias disponíveis em casa ou nas escolas.
              </p>
              <p>  
                Um projeto piloto foi realizado no primeiro semestre de 2012 a partir
                 da parceria entre UNESCO, Sesame Workshop, MSD Brasil, TV Cultura e Secretaria Municipal
                  de Educação de São Paulo, e contemplou as 43 Escolas  Municipais de Educação Infantil 
                  da Diretoria Regional de Educação de Itaquera.
              </p>
              <p>    
                  Saiba mais sobre o projeto, nossos parceiros e acesse todos os conteúdos digitais clicando nos links abaixo.
              </p>  
            <?php else:?>  
              <p>  
                <!--descricao-->    
                <?php echo $displays['destaque-principal'][0]->getDescription() ?>
                <!--/descricao-->
              </p>
             <?php endif;?>
           <?php endif; ?>
          <?php endif; ?>
          <!--/destaque-principal--->
          
          
              
        </div>
       
      <div class="divisa"></div>

      <div class="row-fluid span12 box-pais">
        <?php
        /*
       <!--/box pais habitos-saudaveis--> 
       <?php if($section->getSlug() == "habitos-saudaveis"):?>
        <!--box-dica-->
          <?php if(isset($displays['dicas'])): ?>
            <?php if(count($displays['dicas']) > 0): ?> 
              <div class="span4 dica-pai">
                
                <!--link artigo dica-->
                <a href="#" title="">
                  <h2 class="tit-dicas">
                    <i class="sprite-aspa-esquerda"></i>
                    <?php echo $displays['dicas'][0]->getTitle(); ?>
                  </h2>
                  <p class="ellipsis">
                    <?php echo html_entity_decode($displays['dicas'][0]->Asset->AssetContent->render()) ?>
                  </p>
                  <i class="sprite-aspa-direita"></i>
                </a>
                <!--link artigo dica-->
                
                <!--botao baixa dica-->
                <?php $download = $displays['dicas'][0]->Asset->retriveRelatedAssetsByRelationType("Download") ?>
                <?php if(count($download) > 0): ?>
                  <?php if($download[0]->AssetType->getSlug() == "file"): ?>
                    <a class="btn" href="http://midia.cmais.com.br/assets/file/original/<?php echo $download[0]->AssetFile->getFile() ?>" title="Baixar" target="_blank">baixar</a>
                  <?php endif; ?>
                <?php endif; ?>
                <!--botao baixa dica-->
                
              </div>
            <?php endif; ?>
          <?php endif; ?>
          <!--/box-dica-->
          <?php
            // Pega o bloco "parceiros" da seção "para os pais"
            $forParents = Doctrine::getTable('Section')->findOneById(2399);
            $block = Doctrine::getTable('Block')->findOneBySectionIdAndSlug($forParents->getId(), "parceiros");
            if ($block) {
              $_displays["parceiros"] = $block->retriveDisplays(); // Pega os destaques do bloco "parceiros"
            }    
          ?>
          <!--box artigo-->
          <?php if(count($displays['artigos']) > 0): ?>
            <?php $preview = $displays['artigos'][0]->Asset->retriveRelatedAssetsByRelationType("Preview") ?>
            <div class="span4 artigo">
              <a href="http://cmais.com.br/<?php echo $site->getSlug() ?>/<?php echo $forParents->getSlug() ?>/<?php echo $displays['artigos'][0]->Asset->getSlug() ?>" title="<?php echo $displays['artigos'][0]->getTitle() ?>">
                <img src="<?php echo $preview[0]->retriveImageUrlByImageUsage("image-13") ?>" alt"<?php echo $displays['artigos'][0]->getTitle() ?>"/>
                <h2 class="tit-artigo"><?php echo $displays['artigos'][0]->getTitle() ?></h2> 
                <p><?php echo $displays['artigos'][0]->getDescription() ?></p>
              </a>
            </div>
          <?php else: // senão existir artigo, tenta pegar um segundo destaque do bloco "dicas" pra preencher o espaço ?>
            
            <!--box-dica-->
            <?php if(isset($displays['dicas'][1])): ?>
                <div class="span4 dica-pai">
                  
                  <!--link artigo dica-->
                  <a href="#" title="">
                    <h2 class="tit-dicas">
                      <i class="sprite-aspa-esquerda"></i>
                      <?php echo $displays['dicas'][1]->getTitle(); ?>
                    </h2>
                    <p class="ellipsis">
                      <?php echo html_entity_decode($displays['dicas'][1]->Asset->AssetContent->render()) ?>
                    </p>
                    <i class="sprite-aspa-direita"></i>
                  </a>
                  <!--link artigo dica-->
                  
                  <!--botao baixa dica-->
                  <?php $download = $displays['dicas'][1]->Asset->retriveRelatedAssetsByRelationType("Download") ?>
                  <?php if(count($download) > 0): ?>
                    <?php if($download[0]->AssetType->getSlug() == "file"): ?>
                      <a class="btn" href="http://midia.cmais.com.br/assets/file/original/<?php echo $download[0]->AssetFile->getFile() ?>" title="Baixar" target="_blank">baixar</a>
                    <?php endif; ?>
                  <?php endif; ?>
                  <!--botao baixa dica-->
                  
                </div>
            <?php endif; ?>
            <!--/box-dica-->
            
          <?php endif; ?>
          <!--/box artigo-->
          
          <!--box-parceiros-->
          
          <?php if(isset($_displays['parceiros']) > 0): ?>
            <?php if(count($_displays['parceiros']) > 0): ?>
              <div class="span4 parceiros">
                <p style="margin: 20px 0 12px 0;">Conheça nossos parceiros:</p>
                <a href="<?php echo $_displays['parceiros'][0]->retriveUrl() ?>" title="<?php echo $_displays['parceiros'][0]->getTitle() ?>">
                  <img src="<?php echo $_displays['parceiros'][0]->retriveImageUrlByImageUsage("image-13-b") ?>" alt="<?php echo $_displays['parceiros'][0]->getTitle() ?>" />
                </a>
              </div>
            <?php endif; ?>
          <?php endif; ?>
          <!--/box-parceiros-->
        <?php else: // senão ela se torna uma categoria comum e pega somente a descrição da seção ?>
  
          <!--destaque-principal-->
          <?php echo $section->getDescription() ?>
          <!--/destaque-principal-->
         
      <?php endif; ?> 
     
    <!--/box pais habitos-saudaveis-->
    */
   ?>
   <?php endif; ?>
    <!--/box pais incluir-brincando-->
    <?php if($section->getSlug()=="incluir-brincando"):?>
      

      <div class="row-fluid">
        <!--artigo 1-->
        <div class="span4 artigo" style="margin-left:0px!important;">
          <a href="http://cmais.com.br/vilasesamo/pais-e-educadores/incluir-brincando" title="O Projeto">
            <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/incluirbrincando/01.jpg" alt"Garibaldo, Sivan e Bel estão sorrindo e acendo.">
            <h2 class="tit-artigo">O PROJETO</h2> 
            <p>Saiba mais sobre o Incluir Brincando</p>
          </a>
        </div>
        <!--/artigo 1-->
        
        <!--artigo 2-->
        <div class="span4 artigo">
          <a href="http://cmais.com.br/vilasesamo/pais-e-educadores/parceiros-vila-sesamo" title="Os Parceiros">
            <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/incluirbrincando/02.jpg" alt"Beto e ênio estão abraçados">
            <h2 class="tit-artigo">OS PARCEIROS</h2> 
            <p>O trabalho em conjunto é fundamental para o sucesso do projeto</p>
          </a>
        </div>
        <!--/artigo 2-->
        
        <!--artigo 3-->
        <div class="span4 artigo">
          <a href="http://cmais.com.br/vilasesamo/colecaoincluirbrincando" title="Coleção Incluir Brincando">
            <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/incluirbrincando/04.jpg" alt"descrição do thumbnail: Um livro com capa azul, rodeado por um lápis, uma borboleta e estrela azuis.">
            <h2 class="tit-artigo">COLEÇÃO INCLUIR BRINCANDO</h2> 
            <p>Tenha acesso aos materiais de formação dos professores</p>
          </a>
        </div>
        <!--/artigo 3-->
      </div>
     
    <?php endif;?> 
    <!--/box pais incluir-brincando-->
    
    <!--/box pais habitos-saudaveis-->
    <?php if($section->getSlug()=="habitos-saudaveis"):?>
      

      <div class="row-fluid">
        <!--artigo 1-->
        <div class="span4 artigo" style="margin-left:0px!important;">
          <a href="http://cmais.com.br/vilasesamo/pais-e-educadores/habitos-para-uma-vida-mais-saudavel" title="O Projeto">
            <img src="http://midia.cmais.com.br/assets/image/image-13/7bb2bead8613c6fd74a67576e88e1061a6582b0f.jpg" alt="Come-comecom um cacho de banana na mão">
            <h2 class="tit-artigo">O PROJETO</h2> 
            <p>Saiba mais sobre o Hábitos para uma vida saudável</p>
          </a>
        </div>
        <!--/artigo 1-->
        
        <!--artigo 2-->
        <div class="span4 artigo">
          <a href="http://cmais.com.br/vilasesamo/pais-e-educadores/parceiros-do-projeto-habitos-para-uma-vida-mais-saudavel" title="Os Parceiros">
            <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/habitos/parceiros-habitos.jpg" alt"Groover, Elmo e Bel abraçados">
            <h2 class="tit-artigo">OS PARCEIROS</h2> 
            <p>Conheça quem trabalhou conosco neste projeto</p>
          </a>
        </div>
        <!--/artigo 2-->
        
        <!--artigo 3-->
        <div class="span4 artigo">
          <a href="http://midia.cmais.com.br/assets/file/original/91cf67e6f87ed766ae4d754db7dab36034a8668a.pdf" title="Coleção Incluir Brincando" target="_blank">
            <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/habitos/guia-habitos.jpg" alt"Garibaldo e Bel sentados acenando.">
            <h2 class="tit-artigo">GUIA PARA PROFESSORES</h2> 
            <p>Faça aqui o download do material de formação de professores "Hábitos para uma Vida Saudável"</p>
          </a>
        </div>
        <!--/artigo 3-->
      </div>
     
    <?php endif;?> 
    <!--/box pais habitos-saudaveis-->
    </div>
    <!--/container conteudo-->
    
  </section>
  <!--/section -->
  
  <div class="divisa top"></div>
  
  <!--/section-->
  <section class="todos-itens ">
    <!--lista-->
    <ul role="contentinfo" id="container" class="row-fluid">
      
      <?php if(isset($pager)): ?>
        <?php if(count($pager) > 0): ?>
          <?php $pager2 = count($pager)/9; ?>
          <?php $parent = $section->Parent->getSlug() ?>
          <?php
      /*
          <?php foreach($pager->getResults() as $k=>$d): ?>
          <?php
            $assetPersonagens = array();
            $personagensSection = Doctrine::getTable('Section')->findOneBySiteIdAndSlug($site->id, 'personagens');
            foreach($d->getSections() as $a) {
              if($a->getParentSectionId() == $personagensSection->getId()) {
                $assetPersonagens[] = $a->getSlug();
              }
            }
            foreach($d->getSections() as $a) {
              if(in_array($a->getSlug(),array("videos","jogos","atividades"))) {
                $assetSection = $a;
                break;
              }
            }
          ?>
          <li class="span4 element <?php echo $a->getSlug(); ?> "> 
            <a href="/<?php echo $site->getSlug() ?>/<?php echo $a->getSlug(); ?>/<?php echo $d->getSlug() ?>" title="<?php echo $d->getTitle() ?>">
              <?php $related = $d->retriveRelatedAssetsByRelationType("Preview") ?>
              <?php if($a->getSlug() == "videos"):?>
                 <div class="yt-menu">
                  <img src="http://img.youtube.com/vi/<?php echo $d->AssetVideo->getYoutubeId() ?>/0.jpg" alt="<?php echo $d->getTitle() ?>" />
                </div>
              <?php else:?>
                <img src="<?php echo $related[0]->retriveImageUrlByImageUsage("image-13") ?>" alt="<?php echo $d->getTitle() ?>" />
              <?php endif;?>
              <?php 
              if($a->getSlug() != "jogos" && $a->getSlug() != "videos" && $a->getSlug() != "atividades"):
                $AssetSection = "artigo-ve";
              else:
                $AssetSection = $a->getSlug();
              endif;
              ?>
              <i class="icones-sprite-interna icone-<?php echo $AssetSection; ?>-pequeno"></i>
              <div>
                <img class="altura" src="/portal/images/capaPrograma/vilasesamo2/altura.png"/>
                <?php echo $d->getTitle() ?>
              </div>
            </a>
          </li>
          
          <?php endforeach; ?>
       * 
       */
      ?>
        <?php endif; ?>
      <?php endif; ?>
      <!--/assets-->
      
    </ul> 
    <!--/lista-->  
    
  </section>
  <!--/section-->
  
</div>
<!--/content--> 

<!--paginacao-->
<?php include_partial_from_folder('sites/vilasesamo', 'global/pagination', array('site' => $site, 'section' => $section,  'pager'=>$pager , 'pager2'=>$pager2, 'parent'=>$parent)) ?>
<!--/paginacao-->

<!-- Player do vídeo acessibilidade-->
<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script> 
<!-- script type="text/javascript" src="http://cmais.com.br/portal/js/vilasesamo2/youtubeapi.js"></script --> 
<?php echo $noscript; ?>
<script>
    //Load player api asynchronously.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    var done = false;
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '246',
          width: '300',
          videoId: '<?php echo $displays["destaque-principal"][0]->Asset->AssetVideo->getYoutubeId() ?>',
          events: {
            //'onReady': onPlayerReady,
            //'onStateChange': onPlayerStateChange
          }
        });
    }
    function onPlayerReady(evt) {
        evt.target.playVideo();
    }
    function onPlayerStateChange(evt) {
        if (evt.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
        }
    }
    function playVideo() {
        player.playVideo();
    }
    function stopVideo() {
        player.stopVideo();
    }
    function pauseVideo() { 
        player.pauseVideo();
    }
    $('.play').click(function(){playVideo()});
    $('.stop').click(function(){
      stopVideo();
      $('.stopado,.pausado').remove();
      $('.play').attr('aria-label','Você parou a reprodução amiguinho, para iniciar novamente aperte enter').attr('tabindex','0'); 
      $('.play').before('<span class="stopado" aria-label="Você parou a reprodução amiguinho, para iniciar novamente aperte novamente o link Iniciar o vídeo" tabindex="0"></span>');
      setTimeout(function(){
        $('.stopado').focus();
      },800);
    });
    $('.pause').click(function(){
      pauseVideo();
      $('.stopado,.pausado').remove();
      $('.play').attr('aria-label','Você pausou a reprodução amiguinho, para iniciar novamente aperte enter').attr('tabindex','0'); 
      $('.play').before('<span class="pausado" aria-label="Você pausou a reprodução amiguinho, para iniciar novamente aperte novamente o link Iniciar o vídeo" tabindex="0"></span>');
      setTimeout(function(){
        $('.pausado').focus();
      },800);
    });
</script>
<?php echo $noscript ?>
