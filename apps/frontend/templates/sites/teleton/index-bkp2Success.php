<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/secoes/programaBlog.css" type="text/css" />
<link rel="stylesheet" href="http://cmais.com.br/portal/css/tvcultura/sites/<?php echo $section->Site->getSlug() ?>.css" type="text/css" />
<script type="text/javascript" src="http://cmais.com.br/portal/js/mediaplayer/swfobject.js"></script> 
<script type="text/javascript" src="http://cmais.com.br/portal/js/mediaplayer/swfobject.js"></script>
      
<script>
  // TIMER TRANSMISSAO
  function timer1(){
    var request = $.ajax({
      data: {
        asset_id: '32924',
        url_in: '/teleton/ao-vivo'
      },
      dataType: 'jsonp',
      success: function(data) {
        eval(data);
      },
      url: '/ajax/timer'
    });
  }

  // Update Twitter Statuses
  function updateTweets(){
    $.ajax({
      url: "/ajax/tweetmonitor",
      data: "monitor_id=5",
      success: function(data) {
        $('#twitter').html(data);
      }
    });
  }
  
  $(window).load(function(){
    timer1();
    var t=setInterval("timer1()",60000);
  });
  

  $(function(){ //onready
    updateTweets();
    var t=setInterval("updateTweets()",60000);
  });
</script>
<?php use_helper('I18N', 'Date') ?>
<?php include_partial_from_folder('blocks', 'global/menu', array('site' => $site, 'mainSite' => $mainSite, 'asset' => $asset, 'section' => $section)) ?>

    <!-- CAPA SITE -->
    <div id="capa-site">

      <?php if(isset($displays["alerta"])) include_partial_from_folder('blocks','global/breakingnews', array('displays' => $displays["alerta"])) ?>

      <!-- BARRA SITE -->
      <div id="barra-site">

        <div class="topo-programa">
          <?php if(isset($program) && $program->id > 0): ?>
          <h2>
            <a href="<?php echo $program->retriveUrl() ?>" style="text-decoration: none;">
              <?php if($program->getImageThumb() != ""): ?>
                <img src="http://midia.cmais.com.br/programs/<?php echo $program->getImageThumb() ?>" alt="<?php echo $program->getTitle() ?>" title="<?php echo $program->getTitle() ?>" />
              <?php else: ?>
                <h3 class="tit-pagina grid1"><?php echo $program->getTitle() ?></h3>
              <?php endif; ?>
            </a>
          </h2>
          <?php endif; ?>
          
          <?php if(isset($program) && $program->id > 0): ?>
          <?php include_partial_from_folder('blocks','global/like', array('site' => $site, 'uri' => $uri, 'program' => $program)) ?>
          <?php endif; ?>

          <?php if(isset($program) && $program->id > 0): ?>
            <!-- horario -->
            <div id="horario">
              <p><?php echo html_entity_decode($program->getSchedule()) ?></p>
            </div>
            <!-- /horario -->
          <?php endif; ?>
        </div>

        <?php if(isset($siteSections) && $site->getType() != "Portal"): ?>
        <!-- box-topo -->
        <div class="box-topo grid3">

          <?php include_partial_from_folder('blocks','global/sections-menu', array('siteSections' => $siteSections)) ?>

          <?php if(isset($section->slug)): ?>
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
        <!-- CONTEUDO PAGINA -->
        <div id="conteudo-pagina">

          <!-- CAPA -->
          <div class="capa grid3">

            <!-- ESQUERDA -->
            <div id="esquerda" class="grid2">

              <!-- NOTICIA INTERNA -->
              <div class="box-interna grid2">
                <h3><?php echo $displays['destaque-principal'][0]->getTitle() ?></h3>
                <div class="assinatura grid2">
                  <p class="sup"></p>
                  <div class="box-compartilhar cp-sembg grid2">                  
            <div class="btn-compartilhar">
              <p class="compartilhar">Compartilhar</p>
              <!--a class="print" href="JavaScript:window.print();"></a-->      
              <a class="twt" href="http://twitter.com/teletonoficial" target="_blank"></a>
              <a class="fb" href="https://www.facebook.com/TeletonOficial" target="_blank"></a>
            </div>        
          </div>
                </div>
                
                <div class="texto">
            <?php if(isset($displays['destaque-principal'])): ?>
              <!-- DESTAQUE 2 COLUNAS -->
              <div class="duas-colunas destaque grid2"> 

                  <?php if($displays['destaque-principal'][0]->Asset->AssetType->getSlug() == "image"): ?>
                  <a class="" href="<?php echo $displays[0]->retriveUrl() ?>" title="<?php echo $displays['destaque-principal'][0]->getTitle() ?>">
                  <img src="<?php echo $displays['destaque-principal'][0]->retriveImageUrlByImageUsage('image-6') ?>" alt="<?php echo $displays['destaque-principal'][0]->Asset->getTitle() ?>" name="<?php echo $displays['destaque-principal'][0]->Asset->getTitle() ?>" />
                  
                  <?php elseif($displays['destaque-principal'][0]->Asset->AssetType->getSlug() == "content" || $displays['destaque-principal'][0]->Asset->AssetType->getSlug() == "image-gallery"): ?>
                    <?php $imgs = $displays['destaque-principal'][0]->Asset->retriveRelatedAssetsByAssetTypeId(2); ?>
                    <?php if(count($imgs) > 0): ?>
                      <img src="http://midia.cmais.com.br/assets/image/image-6/<?php echo $imgs[0]->AssetImage->getFile() ?>.jpg" alt="<?php echo $displays['destaque-principal'][0]->Asset->getTitle() ?>" name="<?php echo $displays['destaque-principal'][0]->Asset->getTitle() ?>" />
                    <?php endif; ?>
                  </a>
                  <?php elseif($displays['destaque-principal'][0]->Asset->AssetType->getSlug() == "video"): ?>
                    <iframe title="<?php echo $displays['destaque-principal'][0]->getTitle() ?>" width="640" height="384" src="http://www.youtube.com/embed/<?php echo $displays['destaque-principal'][0]->Asset->AssetVideo->getYoutubeId(); ?>?rel=0&wmode=transparent#t=0m0s" frameborder="0" allowfullscreen></iframe>
                  <?php elseif($displays['destaque-principal'][0]->Asset->AssetType->getSlug() == "video-gallery"): ?>
                    <object height="390" width="640" style="height:390px; width: 640px">
                      <param name="movie" value="http://www.youtube.com/p/<?php echo $displays['destaque-principal'][0]->Asset->AssetVideoGallery->getYoutubeId(); ?>?version=3&amp;hl=en_US&amp;fs=1" />
                      <param name="allowFullScreen" value="true" />
                      <param name="allowscriptaccess" value="always" />
                      <param name="wmode" value="opaque">
                      <embed allowfullscreen="true" allowscriptaccess="always" src="http://www.youtube.com/p/<?php echo $displays['destaque-principal'][0]->Asset->AssetVideoGallery->getYoutubeId(); ?>?version=3&amp;hl=en_US&amp;fs=1" wmode="opaque" type="application/x-shockwave-flash" width="640" height="390"></embed>
                    </object>
                  <?php else: ?>
                  <a class="" href="<?php echo $displays[0]->retriveUrl() ?>" title="<?php echo $displays['destaque-principal'][0]->getTitle() ?>">
                  <img src="<?php echo $displays['destaque-principal'][0]->retriveImageUrlByImageUsage('image-6') ?>" alt="<?php echo $displays['destaque-principal'][0]->getTitle() ?>" name="<?php echo $displays['destaque-principal'][0]->getTitle() ?>" />
                  <?php endif; ?>

                <p class="titulos" style="margin-bottom:0px"><?php echo $displays['destaque-principal'][0]->getTitle() ?></p>
                <p><?php echo $displays['destaque-principal'][0]->getDescription() ?></p>
              </div>
              <!-- /DESTAQUE 2 COLUNAS -->
          <?php endif; ?>
                </div>
                
                <?php include_partial_from_folder('blocks','global/share-2c', array('site' => $site, 'uri' => $uri)) ?>

              </div>
              <!-- /NOTICIA INTERNA -->
              
            </div>
            <!-- /ESQUERDA -->
            
            <!-- DIREITA -->
            <div id="direita" class="grid1">
              <h3>Bastidores</h3> 
              <div id="canal" class="grid1">
                  <!-- BOX CANAL YOUTUBE -->
                  <script src="http://www.gmodules.com/ig/ifr?url=http://www.google.com/ig/modules/youtube.xml&up_channel=culturanoteleton&synd=open&w=300&h=390&title=&border=%23ffffff%7C3px%2C1px+solid+%23999999&output=js"></script>
                  <!-- /BOX CANAL YOUTUBE -->
                </div>  
              <!-- BOX TWITTER -->
                <div class="grid1">
                  <a href="http://twitter.com/teletonoficial" class="twitter-follow-button" target="_blank">Siga @teletonoficial</a>
                  <style>
                    #twitter {border:1px solid #666}
                    #twitter .topo-fb { background-color:#666; overflow:hidden; padding:10px;}
                    #twitter .avatar { margin-right:10px; float:left; }
                    #twitter .topo-fb img { width:31px; }
                    #twitter .topo-fb h3 {font-size:11px; color:#fff;}
                    #twitter .topo-fb h4 a {font-size:14px; color:#fff; font-weith:bold;}
                    #twitter ul {background:#fff; height:360px; overflow:hidden;}
                    #twitter ul img {width:30px;}
                    #twitter ul li {border-bottom:1px dotted #ddd; padding-top:5px;}
                    #twitter ul .avatar {margin: 10px;}
                    #twitter ul li a { color:#ff6633;}
                    #twitter ul li a,
                    #twitter ul li p {font-size:12px; line-height:16px; margin-bottom:5px;}
                    #twitter ul li p {margin-left:50px; padding-right:10px;}
                    #twitter ul li:last-child {border:none; margin-bottom:10px;}
                    #twitter .respiro {background:#ffffff; height:20px;}
                  </style>
                  <div id="twitter"></div>
                  
                </div>
              <!-- /BOX TWITTER -->              
            </div>
            <!-- /DIREITA -->
          </div>
          <!-- /CAPA -->
        </div>
        <!-- /CONTEUDO PAGINA -->
      </div>
      <!-- /MIOLO -->
    </div>
    <!-- /CAPA SITE -->
