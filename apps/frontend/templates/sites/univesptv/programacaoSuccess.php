<?php
$u = explode("/", $url);
array_pop($u);
$base_url = str_replace("/index.php", "", implode("/", $u));
$nextDateUrl = "http://univesptv.cmais.com.br/programacao/".str_replace("/","-",$nextDate); 
$prevDateUrl = "http://univesptv.cmais.com.br/programacao/".str_replace("/","-",$prevDate); 
?>
<script type="text/javascript" src="http://cmais.com.br/portal/js/jquery-ui/js/jquery-ui-1.8.11.custom.min.js"></script>
<script src="http://cmais.com.br/portal/js/jquery-ui-i18n.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/grade.css" type="text/css" />
<link type="text/css" href="http://cmais.com.br/portal/univesptv/css/geral.css" rel="stylesheet" /> 
<!-- <link rel="stylesheet" href="http://cmais.com.br/js/jquery-ui-1.8.7/css/ui-lightness/jquery-ui-1.8.7.custom.css" type="text/css" /> -->
<link type="text/css" href="http://cmais.com.br/portal/js/jquery-ui/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />


<?php use_helper('I18N', 'Date') ?>
<?php include_partial_from_folder('blocks', 'global/menu', array('site' => $site, 'mainSite' => $mainSite, 'section' => $section)) ?>

    <!-- CAPA SITE -->
    <div id="capa-site">

      <?php if(isset($displays["alerta"])) include_partial_from_folder('blocks','global/breakingnews', array('displays' => $displays["alerta"])) ?>

      <!-- BARRA SITE -->
      <div id="barra-site">

        <div class="topo-programa">
          <h2><a href="<?php echo $site->retriveUrl() ?>"><img title="<?php echo $site->getTitle() ?>" alt="<?php echo $site->getTitle() ?>" src="http://midia.cmais.com.br/programs/<?php echo $site->getImageThumb() ?>"style=" display: block; margin-bottom:5px;" />
          	<p>Canal digital 2.2 da multiprogramação da TV Cultura</p>
          </a></h2>
          
         
          <?php if(isset($program) && $program->id > 0): ?>
          <!-- horario -->
          <div id="horario">
          	<a href="http://univesp.br/"><img src="http://cmais.com.br/portal/images/capaPrograma/univesptv/logo-univesp.png" style="display: block;float: right;"></a>
          </div>
          <!-- /horario -->
          <?php endif; ?>

        </div>

        <?php if(isset($siteSections)): ?>
        <!-- box-topo -->
        <div class="box-topo grid3">
          
          <?php include_partial_from_folder('blocks','global/sections-menu2', array('siteSections' => $siteSections)) ?>

          <?php if(isset($section)): ?>
            <?php if(!in_array(strtolower($section->getSlug()), array('home','homepage','home-page','index'))): ?>
            <div class="navegacao txt-10">
              <a href="<?php echo $site->retriveUrl() ?>" title="Home">Home</a>
              <span>&gt;</span>
              <a href="<?php echo $section->retriveUrl()?>" title="<?php echo $section->getTitle()?>"><?php echo $section->getTitle()?></a>
            </div>
            <?php endif; ?>
          <?php endif; ?>

        </div>
        <!-- /box-topo -->
        <?php endif; ?>

      </div>
      <!-- /BARRA SITE -->

      <!-- MIOLO -->
      <div id="miolo">

        <!-- BOX LATERAL -->
        <?php include_partial_from_folder('blocks','global/shortcuts') ?>
        <!-- BOX LATERAL -->
      
        <!-- CONTEUDO PAGINA -->
        <div id="conteudo-pagina">
          
          <!-- estilo menu -->
          <div id="estilo-menu">
            <!-- menu da busca -->
            <ul class="abas grid3">
              <li class="tvcultura<?php if($sChannel->slug == "tvcultura") echo ' ativo'; ?>"><a href="http://tvcultura.cmais.com.br/grade" title="TV Cultura">TV Cultura</a><span class="decoracao"></span></li>
              <li class="univesptv<?php if($sChannel->slug == "univesptv") echo ' ativo'; ?>"><a href="http://univesptv.cmais.com.br/programacao" title="Univesp TV">Univesp TV</a><span class="decoracao"></span></li>
              <li class="multicultura<?php if($sChannel->slug == "multicultura") echo ' ativo'; ?>"><a href="http://multicultura.cmais.com.br/programacao" title="multiCULTURA">multiCULTURA</a><span class="decoracao"></span></li>
              <li class="tvrtb<?php if($sChannel->slug == "tvratimbum") echo ' ativo'; ?> last"><a href="http://tvratimbum.cmais.com.br/grade" title="TV R&aacute; Tim Bum">TV R&aacute; Tim Bum</a><span class="decoracao"></span></li>
            </ul>
            <!-- /menu da busca -->
          </div>
          <!-- /estilo menu -->

          <!-- ESQUERDA -->
          <div id="esquerda" class="grid2">
            
            <!-- menu-calendario -->
            <div class="menu-calendario">
              <div class="box-padrao grid1 carrossel-menu">
                <div class="nav-menu2 topo">
                  <a href="<?php echo $nextDateUrl ?>" class="btn proximo"></a>
                  <a href="<?php echo $prevDateUrl ?>" class="btn anterior" style="float: left;margin-left: 5px;"></a>
                </div>
                <ul class="nav-conteudo conteudo">
                  <li class="filho ativo"><?php echo format_date($date, 'P') ?></li>
                </ul>
              </div>
            </div>
            <!-- menu-calendario -->
            
            <?php if(isset($schedules)): ?>
            <!-- lista calendario -->
            <ul class="lista-calendario grid2">
              <?php foreach($schedules as $k=>$d): ?>
                <li>
                  <?php if((strtotime(date('Y-m-d H:i:s')) >= strtotime($d->getDateStart())) && (strtotime(date('Y-m-d H:i:s')) <= strtotime($d->getDateEnd()))): ?>
                      <a name="agora" id="agora" style="height:60px; width:10px; display:block;"></a>
                      <script>
                      $(function(){
                        $('html, body').animate({scrollTop: $("#agora").offset().top},'slow');
                      });
                      </script>
                    <?php endif; ?>	
                  <div class="barra-grade">                    
                    <p class="hora"><?php echo format_datetime($d->getDateStart(), "HH:mm") ?><?php //echo format_datetime($d->getDateStart(), "d/M HH:mm") ?></p>
                    <a href="#" class="btn-toggle tit<?php if((strtotime(date('Y-m-d H:i:s')) >= strtotime($d->getDateStart())) && (strtotime(date('Y-m-d H:i:s')) <= strtotime($d->getDateEnd())))  echo " now"; ?>"><?php echo $d->Program->getTitle() ?></a>
                    <a href="#" class="botao btn-toggle"></a>
                  </div>
                  <div class="grade toggle" style="display:none; width:auto; padding-bottom:25px;">
                    <div class="capa-foto">
                      <!-- <p class="reprise">18:30 - Reprise deste episódio</p> -->
                      <?php if ($d->retriveLiveImage()): ?>
                      <img src="<?php echo $d->retriveLiveImage() ?>" alt="<?php echo $d->retriveTitle() ?>" />
                      <?php else: ?>
                      <img src="http://cmais.com.br/portal/images/capaPrograma/univesptv/univesptv-logo.jpg" alt="<?php echo $d->retriveTitle() ?>" />
                      <?php endif; ?>
                      <?php if($d->image_source != ""): ?><p class="legenda"><?php echo $d->image_source ?></p><?php endif; ?>
                    </div>
                    <?php if($d->getTitle() != ""): ?>
                      <p class="bold"><?php echo $d->getTitle() ?></p>
                    <?php endif; ?>
                    <p><?php echo html_entity_decode($d->retriveDescription3()) ?></p>
                    <!--
                    <p class="bold"><?php //echo $d->AssetBroadcast->getHeadline() ?></p>
                    <p class="bold"><?php //echo $d->AssetBroadcast->getHeadlineLong() ?></p>
                    -->
                   	 <?php
												$homepage = array("home", "index", "homepage");
												$site_sections = $d->Program->Site->getSections();
												$show_program = FALSE;
												
												foreach ($site_sections as $key => $ss) if(in_array($ss->slug, $homepage))  $show_program = TRUE;
												
												if($show_program):
		        					?>
                    			<a class="site" href="<?php echo $d->retriveUrl() ?>">ir ao site</a>
                    	<?php endif; ?>
                    	
                    <?php if($d->getIsLive()): ?>
                    <br />
                    <a class="site" href="http://univesptv.cmais.com.br">assista ao vivo pela web</a>
                    <?php endif; ?>
                    <br />
                    <a href="http://www.google.com/calendar/event?action=TEMPLATE&text=<?php echo urlencode($d->retriveTitle()) ?>&dates=<?php echo DateTime::createFromFormat('Y-m-d H:i:s', $d->getDateStart())->format('Ymd\THis\Z') ?>/<?php echo DateTime::createFromFormat('Y-m-d H:i:s', $d->getDateStart())->format('Ymd\THis\Z') ?>&details=&location=<?php echo urlencode($d->Program->getTitle()) ?>&trp=false&sprop=http%3A%2F%2Fcmais.com.br&sprop=name:TV%20Cultura" target="_blank" class="google-agenda"><img src="http://www.google.com/calendar/images/ext/gc_button1.gif" border=0 style="width:100px;height:25px;" /></a>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
            <!-- /lista calendario -->
            <?php endif; ?>
            
            <!--?php include_partial_from_folder('blocks','global/share-2c', array('site' => $site, 'uri' => $uri)) ?-->
            
          </div>
          <!-- /ESQUERDA -->
          
          <!-- DIREITA -->
          <div id="direita" class="grid1">
            
            <!-- BOX PUBLICIDADE -->
             <div class="box-publicidade grid1">
              <!-- univesptv-300x250 -->
				<script type='text/javascript'>
				GA_googleFillSlot("univesptv-300x250");
				</script>
             </div>                                   
            <!-- / BOX PUBLICIDADE -->

          </div>
          <!-- /DIREITA -->
          
          <!-- APOIO -->
          <ul id="apoio" class="grid3">
              <li><a href="http://www.desenvolvimento.sp.gov.br" class="governoSp"><img src="http://cmais.com.br/portal/univesptv/images/logo-goversoSp.jpg" alt="Governo do Estado de S&atilde;o Paulo" /></a></li>
              <li><a href="http://www.fapesp.br" class="fapesp"><img src="http://cmais.com.br/portal/univesptv/images/logo-fapesp.png" alt="FAPESP" /></a></li>
              <li><a href="http://www.unicamp.br" class="unicamp"><img src="http://cmais.com.br/portal/univesptv/images/logo-unicamp.png" alt="UNICAMP" /></a></li>
              <li><a href="http://www.unesp.br" class="unesp"><img src="http://cmais.com.br/portal/univesptv/images/logo-unesp.png" alt="UNESP" /></a></li>
              <li><a href="http://www.usp.br" class="usp"><img src="http://cmais.com.br/portal/univesptv/images/logo-usp.png" alt="USP" /></a></li>
              <li><a href="http://www.fundap.sp.gov.br" class="fundap"><img src="http://cmais.com.br/portal/univesptv/images/logo-fundap.jpg" alt="FUNDAP" /></a></li>
              <li><a href="http://www.centropaulasouza.sp.gov.br" class="cps"><img src="http://cmais.com.br/portal/univesptv/images/logo-cps.png" alt="Centro Paula Souza" /></a></li>
          </ul>
          <!-- APOIO -->
          
        </div>
        <!-- CONTEUDO PAGINA -->
        
      </div>
      <!-- /MIOLO -->
      
    </div>
    <!-- / CAPA SITE -->
    
    <form id="send" action="" method="post">
      <input type="hidden" name="c" id="c" value="<?php echo $sChannel->getSlug() ?>" />
      <input type="hidden" name="d" id="d" value="<?php echo $d ?>" />
    </form>
    <script>
      function send(c,d){
        $("#c").val(c);
        $("#d").val(d);
        $("#send").submit();
      }
    </script>    
