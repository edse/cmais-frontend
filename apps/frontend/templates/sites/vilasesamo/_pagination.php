<?php $pageQuant = intval(count($pager)/9); ?>
<?php if(intval($pager2) <= $pageQuant):?>
<?php
  if($section->getSlug() == "pais-e-educadores"):
    $ajaxLoader = "-pais-e-educadores";
    $icone = "icone-carregar-ve-grande";
    $sectionColor = "pais-e-educadores";
  elseif(isset($parent)):
    if($parent == "categorias" || $parent == "campanhas"):
      $ajaxLoader = "-categorias";
      $icone = "icone-carregar-lj-grande";
      $sectionColor = "categorias";
    elseif($parent=="personagens"):
      $ajaxLoader = "-personagens";
      $icone = "icone-carregar-br-grande";
      $sectionColor = "personagens";
    endif;   
  else: 
    $ajaxLoader = "-".$section->getSlug();
    $icone = "icone-carregar-br-grande";
    $sectionColor = $section->getSlug();
  endif;    
?>
<a id="voltar-topo-pagina" href="#" onclick="goTop();" class="<?php echo $sectionColor; ?>"><span>voltar ao topo</span></a>  


<nav id="page_nav">
  <div class="container-ajax-loader">
    <img id="ajax-loader" src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/sprites/ajax-loader<?php if(isset($ajaxLoader)) echo $ajaxLoader ?>.gif" alt="" style="display:none;">
  </div>
  <input type="hidden" class="quantidade-itens" value="">
  <input type="hidden" class="no-repeat" value="">
  <a href="javascript:vilaSesamoGetContents();" class="mais">Carregar mais<i class="icones-sprite-interna  <?php echo $icone ?>"></i></a>
</nav>
<?php endif; ?>
<?php $noscript = "  <noscript>Desculpe mas no seu navegador não esta habilitado o Javascript, habilite-o e recarregue a página para o banner aparecer.</noscript>" ?>

<script src="http://cmais.com.br/portal/js/isotope/jquery.isotope.min.js"></script>
<?php echo $noscript ?>
<script src="http://cmais.com.br/portal/js/vilasesamo2/internas-isotope.js"></script>
<?php echo $noscript ?>
<script>
	//Verify Devices
 	var gFlash = true;
 	var uAgent = navigator.userAgent;
  if(uAgent.indexOf("iPhone") != -1 || uAgent.indexOf("iPod") != -1 || uAgent.indexOf("Android") != -1 && uAgent.indexOf("Mobile") != -1 || uAgent.indexOf("Windows Phone") != -1 && uAgent.indexOf("IEMobile") != -1)  {
  	gFlash = false;
  }

  var firstCount = 0;
  contentPage = 1;
  var no_repeat = "";
  quantPage = <?php echo $pageQuant ?>  + 1;
  $('.mais').click(function(){
    contentPage++;
    no_repeat = $('.no-repeat').attr("value");
    $('li').removeClass('first').removeClass('count');
    $('.firstDescription').remove();
    
    var carregarMais = "";
    
    
  });
  vilaSesamoGetContents();
  
  function countAssets(){
    
    var countItens = 0;
    $('.count').each(function(i){
      countItens = countItens + 1;
    });
    //console.log(countItens);
    <?php
      $selectDescription = "";
      if($section->Parent->getSlug()=="personagens"){
        $selectDescription = "brincadeiras da Personagem " . $section->getSlug();
      }else if($section->Parent->getSlug()=="categorias"){
        $selectDescription = "itens da Categoria" . $section->getSlug();
      }else if($section->getSlug()=="pais-e-educadores"){
        $selectDescription = "artigos da página " . $section->getSlug();
      }else if($section->getSlug()=="campanhas"){
        $selectDescription = "figuras da campanha " . $section->getSlug();
      }else{
        $selectDescription = $section->getSlug();
        if($section->getSlug() == "videos") $os="os";
        else $os="as";
      }
      
      ?>
      if(countItens == 0){
        $('#container li:first').addClass('first');
        $('.first').before("<span class='firstDescription' aria-label='que pena acabou <?php echo  $selectDescription ?> . Você está no primeiro item da lista <?php echo $selectDescription; ?>, divirta-se com estes por enqunanto, boa diversão amiguinho.' tabindex='0'>");
        $('#page_nav').fadeOut('fast');
      }else if(countItens < 9){
        carregarMais=". que pena! não tem mais itens <?php echo $selectDescription; ?> pra carregar.";
        $('#page_nav').fadeOut('fast');
        $('.first').before("<span class='firstDescription' aria-label='você carregou mais "+ countItens +" <?php echo $selectDescription; ?>, você está no primeiro item carregado "+carregarMais+"' tabindex='0'>");
      }else{
        $('.first').before("<span class='firstDescription' aria-label='você carregou mais "+ countItens +" <?php echo $selectDescription; ?>, você está no primeiro item carregado' tabindex='0'>");
      }
      
      
      $('#container li').each(function(i){
        firstCount = firstCount + 1
      });
      
      if(firstCount > 9){
        $('.firstDescription').focus(); 
        
        setTimeout(function(){
          //alert("fui");
          $('#container').find('li.first a').focus();
          $('.firstDescription').remove();
        },5000);
      }
      
      //console.log(firstCount);
      
     
  }
  
  function goTop(){
    $('html, body').animate({
      scrollTop:parseInt($('#content').offset().top-110)
    }, "slow");
  } 
  
  function vilaSesamoGetContents() {
    $.ajax({
      url: "http://app.cmais.com.br/ajax/vilasesamogetcontents",
      dataType: "jsonp",
      data: "page="+contentPage+"&items=9&gflash="+gFlash+"&site=<?php echo $site->getSlug(); ?>&siteId=<?php echo (int)$site->id ?>&sectionId=<?php echo $section->getId(); ?>&section=<?php echo $section->getSlug(); ?>&sectionP=<?php echo $section->getParentSectionId(); ?>&no-repeat="+no_repeat,
      beforeSend: function(){
          $('#ajax-loader').show();
        },
      success: function(data){
        $('#ajax-loader').hide();
        if (data.data != "") {
          var newEls = $(data.data).appendTo('#container');
           
          $("#container").isotope().isotope('appended',newEls);
          
          setTimeout(function(){
            countAssets();
          }, 800);   
        }else{
          $('#page_nav').fadeOut('fast');
        }
      }
    });
  }
   

</script>
<?php echo $noscript ?>