<?php
$section = Doctrine_Query::create()
  ->select('s.*')
  ->from('Section s')
  ->where('s.site_id = 976')
  ->andWhere('s.slug = ?', 'creditos')
  ->fetchOne();
?>

<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/defaultPrograma.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/castelo/geral.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/castelo/interna.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/castelo/creditos.css" type="text/css" />

<?php use_helper('I18N', 'Date') ?>
<?php include_partial_from_folder('blocks', 'global/menu', array('site' => $site, 'mainSite' => $mainSite)) ?>

<div class="bg-site">
</div>

<!--CASTELO-->
<div >
  
    <!-- CAPA SITE -->
    <div id="capa-site">      

      <!-- BARRA SITE -->
      <div id="barra-site">
        <div class="topo-programa">
          
          <h2>
            <a href="http://cmais.com.br/castelo" style="text-decoration: none;">
          
                <img src="http://cmais.com.br/portal/images/capaPrograma/castelo/img-logo-castelo.png" class="logo" alt="Castelo Ra Tim Bum" />
              
            </a>
          </h2>
          

          <?php include_partial_from_folder('sites/castelo','global/like', array('uri' => $uri)) ?>
          
          
        </div>

        <!-- box-topo -->
        <div class="box-topo grid3">

          <?php include_partial_from_folder('sites/castelo','global/menu', array('siteSections' => $siteSections, 'section' => $section)) ?>

         
        </div>
        <!-- /box-topo -->
        
      </div>
      <!-- /BARRA SITE -->
      <div class="bg-video"></div>

      <!-- MIOLO -->
      <div id="miolo">
        
       <!-- CONTEUDO PAGINA -->
        <div id="conteudo-pagina" align="left">
          
          
          
          <h1 id="creditos">
            <img src="http://cmais.com.br/portal/images/capaPrograma/castelo/img-titulo-creditos.png" alt="Créditos">
          </h1>
          
                      
             <?php echo html_entity_decode($asset->AssetContent->render()) ?> 
           
        
        </div>
        <!-- /CONTEUDO PAGINA -->
        <!-- MENU NAVEGAÇÃO-->
         <?php //include_partial_from_folder('sites/castelo','global/casteloMenuInternas', array('site'=>$site, 'siteSections' => $siteSections, 'section' => $section)) ?> 
        <!--/MENU NAVEGAÇÃO-->
        
      </div>
      <!-- /MIOLO -->
    </div>
    <!-- /CAPA SITE -->
</div>   
<!--/CASTELO-->

<!--FANCYBOX-->
<script type="text/javascript" src="http://cmais.com.br/portal/js/fancybox/jquery.fancybox-1.3.4.pack.js" ></script>
<link rel="stylesheet" href="http://cmais.com.br/portal/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<!--/FANCYBOX-->
<!--FANCYBOX-->
<script type="text/javascript">
$(document).ready(function() {
  $('#fancybox-content a').live('hover', function(){
    $(this).fancybox()
  });
  
  $("a[class*=botao], .m-galeria-de-imagens a").not('.botao-porteiro-over, .botao-valdirene-over').fancybox({
    
     'transitionIn' : 'fadein',
    'transitionOut' : 'fadeout',
          'speedIn' : 600, 
         'speedOut' : 200, 
      'overlayShow' : true,
             'type' : 'iframe'
  });
});
</script>
<!--FANCYBOX-->