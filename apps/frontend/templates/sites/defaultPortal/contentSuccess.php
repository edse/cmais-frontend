<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/programaBlog.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/jornalismo-novo2013.css" type="text/css" />
<script type="text/javascript">
$(function(){
  //hover states on the static widgets
  $('#dialog_link, ul#icons li').hover(
    function() { $(this).addClass('ui-state-hover'); }, 
    function() { $(this).removeClass('ui-state-hover'); }
  );
  $('.comentario-fb').show();
});
</script> 

<?php use_helper('I18N', 'Date') ?>
<?php include_partial_from_folder('blocks', 'global/menu', array('site' => $site, 'mainSite' => $mainSite, 'asset' => $asset, 'section' => $section)) ?>
			
<?php 
	//SE A SEÇÃO FOR NOTÍCIAS JORNALISMO OU A CATEGORIA FOR JORNALISMO
	if((isset($section) && $section->slug == "noticias-jornalismo") || (isset($section) && $asset->Category == "Jornalismo")):
		
		$now = date('Y-m-d H:i:s');
		$schedules = Doctrine_Query::create()
		  ->select('s.*')
		  ->from('Schedule s')
		  ->andWhere('s.date_start <= ?', $now)
		  ->andWhere('s.date_end >= ?', $now)  
		  ->andWhere('s.channel_id = ?', 1)
			->limit(1)
		  ->execute();
	
		$live = $schedules[0]->Program->Site->getSlug(); //Slug do Programa Atual
		
		
		//BLOCO DO MENU PROGRAMAS JORNALISMO
		$displays1 = null;	
		$block = Doctrine::getTable('Block')->findOneById(2096); // SEÇÃO JORNALISMO
		if($block) $displays1['destaque-menu-programas'] = $block->retriveDisplays();
?>
<!--MENU-PROGRAMAS-->
<div id="menu-programas">
  <div class="menu-programas">
    <a href="http://cmais.com.br/jornalismo"><h1>Jornalismo</h1></a>
		<?php if(isset($displays1["destaque-menu-programas"])): ?>
			<ul>
				<?php foreach ($displays1["destaque-menu-programas"] as $k => $d): ?>
		      <li class="<?php echo $d->getHeadline()?>">
		        <a class="btn-programas btn-<?php echo $d->getHeadline()?><?php if($live == $d->getHeadline()) echo " active"?> " href="<?php echo $d->retriveUrl()?>" title="<?php echo $d->getTitle()?>"></a>
			      <?php if($live == $d->getHeadline()) echo $btn_live?> 
		      </li>
				<?php endforeach;?>
			</ul>
		<?php endif;?>      
  </div>
</div>
<!--/MENU-PROGRAMAS-->		
						
<?php endif;?>


    <!-- CAPA SITE -->
    <div id="capa-site">

      <?php if(isset($displays["alerta"])) include_partial_from_folder('blocks','global/breakingnews', array('displays' => $displays["alerta"])) ?>

      <!-- BARRA SITE -->
      <div id="barra-site">
        <?php
         /*
        <?php if(isset($program) && $program->id ): ?>
        <div class="topo-programa">
          <!--
          <h2>
            <a href="<?php echo $program->retriveUrl() ?>">
              <img src="http://midia.cmais.com.br/programs/<?php echo $program->getImageThumb() ?>" alt="<?php echo $program->getTitle() ?>" title="<?php echo $program->getTitle() ?>" />
            </a>
          </h2>
          -->
          <?php endif; ?>
       
          <?php if(isset($program) && $program->id > 0): ?>
            <!-- horario -->
            <div id="horario">
              <p><?php echo html_entity_decode($program->getSchedule()) ?></p>
            </div>
            <!-- /horario -->
        </div>
        <?php endif; ?>
        */
        ?>
        <?php if(isset($siteSections) && $site->getType() != "Portal"): ?>
        <!-- box-topo -->
        <div class="box-topo grid3">
          
          <?php include_partial_from_folder('blocks','global/sections-menu', array('siteSections' => $siteSections)) ?>

          <?php if(isset($section)): ?>
            <?php if(!in_array(strtolower($section->getSlug()), array('home','homepage','home-page','index'))): ?>
            <div class="navegacao txt-10">
              <a href="<?php echo $site->retriveUrl() ?>" title="Home">Home</a>
              <span>&gt;</span>
              <a href="<?php echo $asset->retriveUrl()?>" title="<?php echo $asset->getTitle()?>"><?php echo $asset->getTitle()?></a>
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

          <!-- CAPA -->
          <div class="capa grid3">

            <!-- ESQUERDA -->
            <div id="esquerda" class="grid2">
							
              <!-- NOTICIA INTERNA -->
              <div class="box-interna grid2">
                <h3><?php echo $asset->getTitle() ?></h3>
                <p><?php echo $asset->getDescription() ?></p><br>
                <div class="assinatura grid2">
                  <p class="sup"><?php echo $asset->AssetContent->getAuthor() ?> <span><?php echo $asset->retriveLabel() ?></span></p>
                  <p class="inf"><?php echo format_date($asset->getCreatedAt(), "g") ?> - Atualizado em <?php echo format_date($asset->getUpdatedAt(), "g") ?></p>
                  <!--
                  <div class="acessibilidade">
                    <a href="#" class="zoom">+A</a>
                    <a href="#" class="zoom">-A</a>
                  </div>
                  -->

                  <?php include_partial_from_folder('blocks','global/share-small', array('site' => $site, 'uri' => $uri)) ?>

                </div>
                
                <div class="texto">
                  <?php echo html_entity_decode($asset->AssetContent->render()) ?>
                </div>
                
                <?php $relacionados = $asset->retriveRelatedAssetsByRelationType('Asset Relacionado'); ?>
                <?php if(count($relacionados) > 0): ?>
                  <!-- SAIBA MAIS -->
                  <div class="box-padrao grid2" style="margin-bottom: 20px;">
                  	<div id="saibamais">                                                            
                  	<h4>saiba +</h4>                                                            
                    <ul class="conteudo">
                      <?php foreach($relacionados as $k=>$d): ?>
                        <li style="width: auto;">
                          <a class="titulos" href="<?php echo $d->retriveUrl()?>" style="width: auto;"><?php echo $d->getTitle()?></a>
                          <!--
                          <?php if($d->retriveImageUrlByImageUsage("image-1") != ""): ?>
                            <a href="<?php echo $d->retriveUrl()?>" class="img-90x54" style="width: auto">
                              <img src="<?php echo $d->retriveImageUrlByImageUsage("image-1-b") ?>" alt="<?php echo $d->getTitle() ?>" title="<?php echo $d->getTitle() ?>" style="width: auto" />
                            </a>
                          <?php endif; ?>
                          -->
                          <!--p><?php echo $d->getDescription()?></p-->
                        </li>
                      <?php endforeach; ?>
                    </ul>
                   </div>
                  </div>
                  <!-- SAIBA MAIS -->
                <?php endif; ?>

                <?php include_partial_from_folder('blocks','global/share-2c', array('site' => $site, 'uri' => $uri, 'asset' => $asset)) ?>

              </div>
              <!-- /NOTICIA INTERNA -->
              
            </div>
            <!-- /ESQUERDA -->
            
            <!-- DIREITA -->
            <div id="direita" class="grid1">

              <!-- BOX PADRAO -->
              <?php if(isset($displays["destaque-apresentadores"])) include_partial_from_folder('blocks','global/display-1c-hosts', array('displays' => $displays["destaque-apresentadores"])) ?>
              <!-- /BOX PADRAO -->
              
              <!-- BOX PUBLICIDADE -->
              <div class="box-publicidade grid1">
                <!-- cmais-assets-300x250 -->
                <script type='text/javascript'>
                GA_googleFillSlot("cmais-assets-300x250");
                </script>
              </div>
              <!-- / BOX PUBLICIDADE -->

              <?php $relacionados = array(); if($asset) $relacionados = $asset->retriveRelatedAssets2(); ?>
              <?php if(count($relacionados) > 0): ?>
              <?php //$relacionados = $relatedAssets; if(count($relacionados) > 0): ?>
              <!-- BOX PADRAO Mais recentes -->
              <div class="box-padrao grid1">
                <div class="topo claro">
                  <span></span>
                  <div class="capa-titulo">
                    <h4>relacionadas</h4>
                    <a href="/feed" class="rss" title="rss"></a>
                  </div>
                </div>
                <?php if(count($relacionados) > 0) include_partial_from_folder('blocks','global/recent-news', array('displays' => $relacionados)) ?>
              </div>
              <!-- BOX PADRAO Mais recentes -->
              <?php endif; ?>

              <?php if(isset($displays["destaque-noticias-recentes"])): ?>
              <!-- BOX PADRAO Mais recentes -->
              <div class="box-padrao grid1">
                <div class="topo claro">
                  <span></span>
                  <div class="capa-titulo">
                    <h4>+ recentes</h4>
                    <a href="/feed" class="rss" title="rss" style="display: block"></a>
                  </div>
                </div>
                <?php if(isset($displays["destaque-noticias-recentes"])) include_partial_from_folder('blocks','global/recent-news', array('displays' => $displays["destaque-noticias-recentes"])) ?>
              </div>
              <!-- BOX PADRAO Mais recentes -->
              <?php endif; ?>

              <?php if(isset($displays["destaque-categorias"])): ?>
              <!-- BORDA 02 -->
              <div class="box-padrao box-borda grid1">
                <div class="topo claro">
                  <span></span>
                  <div class="capa-titulo">
                    <h4><?php if(isset($displays["destaque-categorias"])) echo $displays["destaque-categorias"][0]->Block->getTitle() ?></h4>
                  </div>
                </div>
                <div class="conteudo top tipo2">
                  <?php if(isset($displays["destaque-categorias"])) include_partial_from_folder('blocks','global/popular-news', array('displays' => $displays["destaque-categorias"])) ?>
                </div>
                <div class="detalhe-borda grid1"></div>
              </div>
              <!-- /BORDA 02 -->
              <?php endif; ?>
              
              <?php if(isset($displays["destaque-links"])): ?>
              <!-- BOX PADRAO + Visitados -->
              <div class="box-padrao mais-visitados grid1">
                <div class="topo">
                  <span></span>
                  <div class="capa-titulo">
                    <h4><?php if(isset($displays["destaque-links"])) echo $displays["destaque-links"][0]->Block->getTitle() ?></h4>
                  </div>
                </div>
                <?php if(isset($displays["destaque-links"])) include_partial_from_folder('blocks','global/popular-news', array('displays' => $displays["destaque-links"])) ?>
              </div>
              <!-- /BOX PADRAO + Visitados -->
              <?php endif; ?>

            </div>
            <!-- /DIREITA -->
          </div>
          <!-- /CAPA -->
        </div>
        <!-- /CONTEUDO PAGINA -->

      </div>
      <!-- /MIOLO -->
    </div>
    <!-- / CAPA SITE -->
    

