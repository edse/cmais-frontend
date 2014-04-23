  <?php  $noscript = "  <noscript>Desculpe mas no seu navegador não esta habilitado o Javascript, habilite-o e recarregue a página</noscript>"; ?>
    <!--conteudo Game -->
    <?php
    /*
   * Pega a campanha (seção filha de "campanhas") e as categorias (seçao filha de "categorias") as quais o asset pertence
   */
  $categories = array();
  $sections = $asset->getSections();
  foreach($sections as $s) {
    if($s->getParentSectionId() > 0) {
      $parentSection = Doctrine::getTable('Section')->findOneById($s->getParentSectionId());
      if($parentSection->getSlug() == "categorias") {
        $categories[] = $s;
      }
    }
  }
  $campaign = false;
  foreach($sections as $s) {
    if($s->getParentSectionId() > 0) {
      $parentSection = Doctrine::getTable('Section')->findOneById($s->getParentSectionId());
      if($parentSection->getSlug() == "campanhas") {
        if($s->getIsActive() == 1) { 
          $campaign = $s;
          break;
        }
      }
    }
  }
      
?>

<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/vilasesamo2/internas.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/vilasesamo2/assets.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/vilasesamo2/puzzle/main.css">
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/vilasesamo2/puzzle/vilasesamopuzzle.css">

<script src="http://cmais.com.br/portal/js/jquery-ui/js/jquery-ui-1.8.11.custom.min.js"></script>
<?php echo $noscript; ?>
<script src="http://cmais.com.br/portal/js/modernizr/modernizr.min.js" type="text/javascript"></script>
<?php echo $noscript; ?>
<script src="http://cmais.com.br/portal/js/hammer.min.js" type="text/javascript"></script>
<?php echo $noscript; ?>
<script type="text/javascript" src="http://cmais.com.br/portal/js/responsive-carousel/script.js"></script>
<?php echo $noscript; ?>
<script type="text/javascript" src="http://cmais.com.br/portal/js/vilasesamo2/paiseeducadores.js"></script>
<?php echo $noscript; ?>
<link type="text/css" rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/vilasesamo2/responsive-carousel/style-vilasesamo.css"/>
<script type="text/javascript" src="http://cmais.com.br/portal/js/bootstrap/bootstrap-fileupload.js"></script>
<?php echo $noscript; ?>
<script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/modernizr.custom.01885.js"></script>
<?php echo $noscript; ?>
<script>
  $("body").addClass("interna jogos");
</script>
<?php echo $noscript; ?>

<!-- HEADER -->
<?php include_partial_from_folder('sites/vilasesamo', 'global/menu', array('site' => $site, 'mainSite' => $mainSite, 'section' => $section)) ?>
<!-- /HEADER -->

<!--content-->
<div id="content">
  <h1 tabindex="0" class="ac-explicacao">
    Você está na jogo <?php echo $asset->getTitle() ?>
  </h1>
  
  <!--section -->
  <section class="filtro row-fluid">
    <h1>
      <i class="icones-sprite-interna icone-jogos-grande"></i>
      JOGOS
      <a class="todos-assets" title="voltar para todas jogos" href="/<?php echo $site->getSlug()?>/jogos" target="_self" >
        <i class="icones-setas icone-voltar-jogos"></i>
        <p aria-hidden="true" tabindex="-1">todos os jogos</p>
      </a>
    </h1>
    
    <!--conteudo-asset-->
    <div class="conteudo-asset">
      
        <h2  tabindex="0"><?php echo $asset->getTitle() ?></h2>
          <?php
          /*
           * Este código serve apenas para pegar o selo (imagem) que indica que o asset pertence a uma categoria especial (entenda categoria como subseção de "categorias").
           * Este selo é um destaque de imagem - pode ser genérico! - dentro do bloco "selo" de cada categoria.
           * Todas as categorias tem este bloco, mas somente as marcadas como "is homepage" serão consideradas como especiais, tais como "Incluir Brincando" e "Hábitos Saudáveis".
           */
          ?>
          <p aria-label="Jogo: <?php echo $asset->getDescription() ?>"  tabindex="0">
          
            <span aria-hidden="true" style="width: 70%;float: left;"><?php echo $asset->getDescription() ?></span>
            <?php if(isset($categories)): ?>
            <?php if(count($categories) > 0): ?>
              <?php
                foreach($categories as $c) {
                  if($c->getIsHomepage() == 1) { // A seção filha de "categorias" precisa estar com a opção "is Homepage" marcada para ser considerada especial, tais como "Hábitos Saudáveis" e "Incluir Brincando".
                    $seloTitle = $c->getTitle(); // pega o título da secão filha
                    $seloUrl = $c->retriveUrl(); // pega a url da seção filha
                    $block = Doctrine::getTable('Block')->findOneBySectionIdAndSlug($c->getId(), "selo"); // Pega o bloco "selo" da seção filha
                    $category_displays["selo"] = $block->retriveDisplays(); // Pega os destaques do bloco "selo"
                    $seloImageUrl = $category_displays["selo"][0]->retriveImageUrlByImageUsage("original"); // Pega a imagem do destaque
                  }
                }
              ?>
              <?php if(isset($seloImageUrl)): ?>
                <a  href="<?php echo $seloUrl ?>" title="<?php echo $seloTitle ?>">
                  <img src="<?php echo $seloImageUrl ?>" alt="<?php echo $seloTitle ?>" />
                </a>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
          </p>
          
          
          <?php if(isset($asset)): ?>
          <div class="turn-the-cell-please" style="display:none;">
            <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/memoria/vire-celular.png" alt=""/>
          </div>
       
          <div class="asset" style="display:none;">
            <?php //echo html_entity_decode($asset->AssetContent->render()) ?>
            <!--GAME-->
            
            
            
            <div class="container">
              
              <div class="jumbotron back-entry-sesame-street">
                <!--[if lt IE 10]>
                  <p style="color:red; background:yellow; width:80%; overflow:hidden; font-weight:bold; font-size: 20px; text-align:center;padding: 10px; margin:20px auto; border:3px dashed red;">Você está usando um navegador antigo. Recomendamos <a href="http://browsehappy.com/" style="color:blue;font-size:20px; text-decoration:underline!important; display:inline-block">que atualize seu navegador</a> para você ter uma expêriencia melhor.</p>
                <![endif]-->
                <p>
                  <button id="play-btn-lg" type="button" class="btn btn-success btn-lg btn-play-sesame-street">
                    <!--<span class="glyphicon glyphicon-play"></span> PLAY -->
                  </button>
                </p>
              </div>
            </div>
            
            <ul class="nav nav-pills abs">
              <li id="home">
                <button id="btn-home" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-home"></span> Home</button>
              </li>
              <li id="play">
                <button id="btn-play" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-play"></span> Play</button>
              </li>
              <li id="pause" class="control">
                <button id="btn-pause" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-pause"></span> Pause</button>
              </li>
              <li id="fullscreen" class="control">
                <button id="btn-fullscreen" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-fullscreen"></span> Fullscreen</button>
              </li>
              <li id="exitfullscreen" class="control">
                <button id="btn-exitfullscreen" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-resize-small"></span> Exit Fullscreen</button>
              </li>
              <li id="bgm" class="control">
                <button id="btn-bmg-on" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-volume-up"></span> BGM On</button>
              </li>
              <li id="bgmoff" class="control">
                <button id="btn-bmg-off" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-volume-off"></span> BGM Off</button>
              </li>
              <li id="sfx" class="control">
                <button id="btn-sfx-on" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-volume-up"></span> SFX On</button>
              </li>
              <li id="sfxoff" class="control">
                <button id="btn-sfx-off" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-volume-off"></span> SFX Off</button>
              </li>
              <li id="autosnap" class="control">
                <button id="btn-autosnap-on" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-remove"></span> Auto-Snap On</button>
              </li>
              <li id="autosnapoff" class="control">
                <button id="btn-autosnap-off" type="button" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-ok"></span> Auto-Snap Off</button>
              </li>
            </ul>

            <!-- Game modal -->
            <div id="modal-success" class="modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div id="modal-dialog" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <p><span id="tempodojogo" class="tempo">4 peças em 30s</span></p>
                    <span id="logo" class="logo"></span>
                  </div>
                  <div class="modal-body">   
                  	 <div class="btn-group fasedownload" style="display:none;"> 
                  	   <h2>Clique para <br>a atividade!</h2>  
                  	 	 <a href="http://cmais.com.br/vilasesamo/atividades/quebra-cabeca-vila-sesamo-fase-01" target="_blank" class="botoes btn-download1" id="fase1" style="display:none;"></a>
                  	 	 <a href="http://cmais.com.br/vilasesamo/atividades/quebra-cabeca-vila-sesamo-fase-02" target="_blank" class="botoes btn-download2" id="fase2" style="display:none;"></a>
                  	 	 <a href="http://cmais.com.br/vilasesamo/atividades/quebra-cabeca-vila-sesamo-fase-03" target="_blank" class="botoes btn-download3" id="fase3" style="display:none;"></a>

                     </div>
                  </div>
                  <div class="modal-footer">
                      <div class="btn-group">
                      <a href="http://cmais.com.br/vilasesamo/jogos/quebra-cabeca-vila-sesamo" class="botoes btn-inicio" id="inicio"> </a>
                      <button type="button" class="botoes btn-pxfase" id="next"></button>
                      <button type="button" class="botoes btn-restart" id="restart" style="display: none;"> </button>
                      <p><span id="stage" class="fase">Fase 1 completa!</span></p>
                      
                      
                    </div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    				
    <!-- Game canvas -->
    <div id="game">
    	<a href="http://cmais.com.br/vilasesamo/jogos/quebra-cabeca-vila-sesamo" class="botoes btn-inicio-canvas" id="inicio_canvas" style="display: none;"></a>
    	<a href="http://cmais.com.br/vilasesamo" class="botoes btn-volta-canvas" id="volta_canvas" style="display: none;"> </a>
      <canvas id="canvas" style="display:none"></canvas>
      <canvas id="canvas_bg" style="display:none"></canvas>
    </div>
    
    <!-- DEBUG -->
    <div id="debug" style="display:none">
      <div>
        pieces: <input type="text" name="p" id="p" />
        pieces placed: <input type="text" name="pp" id="pp" />
        lines: <input type="text" name="l" id="l" />
        Pieces width: <input type="text" name="pw" id="pw" />
        Pieces height: <input type="text" name="ph" id="ph" />
      </div>
      <div>
        moving: <input type="text" name="moving" id="moving" />
        over: <input type="text" name="over" id="over" />
        selected: <input type="text" name="selected" id="selected" />
      </div>
      <div>
        x: <input type="text" name="mx" id="mx" />
        y: <input type="text" name="my" id="my" />
      </div>
      <div>
        p1 x: <input type="text" name="px" id="px" />
        p1 y: <input type="text" name="py" id="py" />
      </div>
      <div>
        h1 x: <input type="text" name="hx" id="hx" />
        h1 y: <input type="text" name="hy" id="hy" />
      </div>
      <div>
        h2 x: <input type="text" name="hx2" id="hx2" />
        h2 y: <input type="text" name="hy2" id="hy2" />
      </div>
    </div>
    <!-- /DEBUG -->

    <!-- build:js scripts/vendor.js -->
    <!-- bower:js -->
    <!--script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/jquery/jquery.js"></script-->
    <!-- endbower -->
    <!-- endbuild -->

  

    <!-- build:js scripts/plugins.js -->
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/affix.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/alert.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/dropdown.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/tooltip.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/modal.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/transition.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/button.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/popover.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/carousel.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/scrollspy.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/collapse.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/bower_components/bootstrap/js/tab.js"></script>
    <!-- endbuild -->

    <!-- build:js({app,.tmp}) scripts/main.js -->
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/extend.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/mouse.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/point2D.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/piece.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/holder.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/game.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/puzzle.js"></script>
    <script src="http://cmais.com.br/portal/js/vilasesamo2/puzzle/init.js"></script>
    <!-- endbuild -->
            
            <!--GAME-->
           
          </div>
          <input class="top" type="hidden" value="false">
          <?php endif; ?>
          
        </div>
      </section>
      <!--/section-->
    
      <?php include_partial_from_folder('sites/vilasesamo', 'global/form-campanha', array("site" => $site, "asset" => $asset, "campaign" => $campaign, "categories" => $categories)) ?>
  
      <?php include_partial_from_folder('sites/vilasesamo', 'global/brinque-tambem-com', array("site" => $site, "section" => $section, "asset" => $asset, "campaign" => $campaign, "categories" => $categories)) ?>
      
      <?php include_partial_from_folder('sites/vilasesamo', 'global/para-os-pais', array("site" => $site, "asset" => $asset, "categories" => $categories, "uri" => $uri)) ?>
    
    </div>
    <!--/content-->
     
    
    <script>
    setInterval(function(){
      updateOrientation();  
    },500);
    
    
    function updateOrientation(){  
      var screenWidth = screen.width;
      var windowWidth = window.innerWidth;
      //alert(windowWidth);
      //console.log("oiiiii");
      if (windowWidth > 470 || (screenWidth > 470 && windowWidth > 470 && window.orientation == 90) || (screenWidth > 470 && windowWidth > 470 && window.orientation == -90) || navigator.platform == "Win32" || navigator.platform == "Win64") {  
        $('.asset').fadeIn('fast');
        $('.turn-the-cell-please').hide();
        //goTopGame('header');
      } else {  
        $('.asset').hide();
        $('.turn-the-cell-please').fadeIn('fast'); 
        //goTopGame('#gameIntro'); 
      } 
    }
    
    function goTopGame(el){
      alert($(el).offset().top)
      $('html, body').animate({
        scrollTop:parseInt($(el).offset().top)
      }, "fast");
    }
    </script>
    
    <!--conteudo Game -->
    
       