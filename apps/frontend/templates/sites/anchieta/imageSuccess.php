<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/defaultPrograma.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/<?php echo $site->getSlug() ?>.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/videos.css" type="text/css" />
<script type="text/javascript">
$(function(){
  //carrossel
    $('#carrossel1').jcarousel({
        wrap: "both",
        scroll: 1
    });
    //carrossel
    $('#carrossel4').jcarousel({
        wrap: "both",
        scroll: 4
    });
});
</script>

<?php
  $vid1 = Doctrine_Query::create()
    ->select('a.*')
    ->from('Asset a, AssetImage ai')
    ->where('a.id = ai.asset_id')
    ->andWhere('a.site_id = ?', (int)$site->id)
    ->andWhere('a.asset_type_id = 2')
    ->limit(12)
    ->orderBy('a.id desc')
    ->execute();
  if(!isset($asset)) $asset = $vid1[0];

  $vid2 = Doctrine_Query::create()
    ->select('a.*')
    ->from('Asset a, AssetImage ai')
    ->where('a.id = ai.asset_id')
    ->andWhere('a.asset_type_id = 2')
    ->limit(30)
    ->orderBy('a.id desc')
    ->execute();
?>

<?php use_helper('I18N', 'Date') ?>
<?php include_partial_from_folder('blocks', 'global/menu', array('site' => $site, 'mainSite' => $mainSite, 'asset' => $asset, 'section' => $section)) ?>
	
	<div class="bg-chamada">
	  <?php if(isset($displays["alerta"])) include_partial_from_folder('blocks','global/breakingnews', array('displays' => $displays["alerta"])) ?>
	</div>
	<div class="bg-site"></div>

    <!-- / CAPA SITE -->
    <div id="capa-site">

      <!-- BARRA SITE -->
			<div id="barra-site" title="<?php echo $section->getTitle() . "  ". $section->getDescription() ?>">
						<a href="<?php echo $site->retriveUrl() ?>"><img src="http://cmais.com.br/portal/images/timeline/topo.png"></a>
					
				
				<!-- TOPO -->
		    <div class="topo-programa">
		    	
	    		<!-- MENU -->
					<?php include_partial_from_folder('blocks','global/sections-menu2', array('siteSections' => $siteSections))?>
					<!--/ MENU -->
					
		    <!-- / TOPO -->  
		    </div>
		  <!-- /BARRA SITE -->  
      </div>

      <!-- MIOLO -->
      <div id="miolo">
        
        <?php include_partial_from_folder('blocks','global/shortcuts') ?>

        <!-- CONTEUDO PAGINA -->
        <div id="conteudo-pagina">

          <!-- CAPA -->
          <div class="capa grid3">

            <!-- ESQUERDA -->
            <div id="esquerda" class="grid2">

              <?php include_partial_from_folder('blocks','global/asset-2c-video', array('asset' => $asset, 'ipad' => $ipad)) ?>

              <?php include_partial_from_folder('blocks','global/share-2c', array('site' => $site, 'uri' => $uri, 'asset' => $asset)) ?>

            </div>
            <!-- /ESQUERDA -->

            <!-- DIREITA -->
            <div id="direita" class="grid1">

              <?php include_partial_from_folder('blocks','global/display-1c-list-carrossel', array('displays' => $vid1)) ?>

              <?php //include_partial_from_folder('blocks','global/display-1c-list-carrossel', array('displays' => $vid1)) ?>
              
              <!-- BOX PUBLICIDADE -->
              <div class="box-publicidade grid1">
                <!-- programas-assets-300x250 -->
                <script type='text/javascript'>
                GA_googleFillSlot("univesptv-300x250");
                </script>
              </div>
              <!-- / BOX PUBLICIDADE -->
              
              <?php if(isset($displays["destaque-noticias"])): ?>
              <!-- BOX PADRAO Noticia -->
              <div class="box-padrao grid1">
                <div class="topo claro">
                  <span></span>
                  <div class="capa-titulo">
                    <h4>Not&iacute;cias + recentes</h4>
                    <!-- <a href="#" class="rss" title="rss"></a> -->
                  </div>
                </div>
                <?php include_partial_from_folder('blocks','global/recent-news', array('displays' => $displays["destaque-noticias"])) ?>
              </div>
              <!-- /BOX PADRAO Noticia -->
              <?php endif; ?>

            </div>
            <!-- /DIREITA -->
          </div>
          <!-- /CAPA -->

          <!-- MENU-RODAPE -->
          <?php include_partial_from_folder('blocks','global/display-3c-last-videos', array('displays' => $vid2, 'title' => 'Últimas Imagens')) ?>
          <!-- /MENU-RODAPE -->

          <!-- BOX PUBLICIDADE 2 -->
          <div class="box-publicidade pub-grd grid3">
            <!-- programas-assets-728x90 -->
            <script type='text/javascript'>
            GA_googleFillSlot("univesptv-300x250");
            </script>
          </div>
          <!-- / BOX PUBLICIDADE 2 -->
          
					<?php if (isset($displays["rodape-interno"])): ?>
          <!--APOIO-->
          <?php include_partial_from_folder('blocks','global/support', array('displays' => $displays["rodape-interno"])) ?>
          <!--/APOIO-->
          <?php endif; ?>
          
        </div>
        <!-- /CONTEUDO PAGINA -->
      </div>
      <!-- /MIOLO -->
    </div>
    <!-- / CAPA SITE -->

