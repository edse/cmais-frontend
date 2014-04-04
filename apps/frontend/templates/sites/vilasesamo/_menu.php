  <?php
   if($section->getSlug() == "home"){
     $classLogo = "sprite-logo-sesamo";
     //$border = "";
   }else{
    $classLogo = "";
    //$border = "<i class='sprite-detalhe-amarelo4'></i>";
   }
   
  ?>
  <!--nav-->
  <nav class="header-bar" aria-label="Navegação do site" >
    
    <!--content-->
    <div class="content">
      
      <h1>
        <a href="http://cmais.com.br/vilasesamo" class="<?php echo $classLogo; ?>" title="link" aria-label="link para a home do site">
          <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/logo-vila-menu.jpg"  alt="Logo Vila Sésamo"/>
        </a>
        <?php //echo $border ?>
      </h1>
      
      <!--lista menu-->
      <ul>
        <li class="btn-personagens" data-width="260" data-time="1000" data-back="500">
          <a href="http://cmais.com.br/vilasesamo/personagens" title="Personagens">
            <span class="texto">Personagens</span>
            <i class="icones-sprite-menu icone-btn-personagens"></i>
            <span class="fundo fundo-personagens"></span>
            <span class="borda borda-personagens"></span>
          </a>
        </li>
        
        
        <!--lista item-->
        <li class="btn-atividades" data-width="225" data-time="800" data-back="500">
          <a href="http://cmais.com.br/vilasesamo/atividades"  title="Atividades">
            <span class="texto">Atividades</span>
            <i class="icones-sprite-menu icone-btn-atividades"></i>
            <span class="fundo fundo-atividades"></span>
            <span class="borda borda-atividades"></span>
          </a>
       </li>
       <!--/lista item-->
       
       <!--lista item-->
        <li class="btn-videos" data-width="170" data-time="400" data-back="200">
          <a href="http://cmais.com.br/vilasesamo/videos"  title="Vídeos">
            <span class="texto">Vídeos</span>
            <i class="icones-sprite-menu icone-btn-videos"></i>
            <span class="fundo fundo-videos"></span>
            <span class="borda borda-videos"></span>
          </a>
        </li>
        <!--/lista item-->
        
        <!--lista item-->
        <li class="btn-jogos" data-width="160" data-time="400" data-back="200">
          <a href="http://cmais.com.br/vilasesamo/jogos" title="Jogos">
            <span class="texto">Jogos</span>
            <i class="icones-sprite-menu icone-btn-jogos"></i>
            <span class="fundo fundo-jogos"></span>
            <span class="borda borda-jogos"></span>
          </a>
        </li>
        <!--/lista item-->
        
        <!--lista item-->
        <li class="btn-participe" data-width="220" data-time="400" data-back="200">
          <a href="http://cmais.com.br/vilasesamo/campanhavilasesamo" title="Jogos">
            <span class="texto">Participe</span>
            <i class="icones-sprite-menu icone-btn-participe"></i>
            <span class="fundo fundo-participe"></span>
            <span class="borda borda-participe"></span>
          </a>
        </li>
        <!--/lista item-->
        
      </ul>
      <!--/lista menu-->
    </div>
    <!--/content-->
  </nav>
  <!--/nav-->
  
  <nav id="header-bar-mobile" aria-label="Navegação do site" >
    
    <!--content-->
    <div class="content">
      
      <!--h1>
        <a href="http://cmais.com.br/vilasesamo" title="link" aria-label="link para a home do site">
          <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/logo.png"  alt="Logo Vila Sésamo"/>
        </a>
        <?php //echo $border ?>
      </h1-->
      
      <nav id="menu-mobile">
      	<a href="http://cmais.com.br/vilasesamo/jogos" title="Jogos">
					<img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/jogos.png">
        </a>
        <a href="http://cmais.com.br/vilasesamo/videos"  title="Vídeos">
					<img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/videos.png">
        </a>
        <a href="http://cmais.com.br/vilasesamo/atividades"  title="Atividades">
					<img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/atividades.png">
        </a>
        <a href="http://cmais.com.br/vilasesamo/personagens" title="Personagens">
          <img src="http://cmais.com.br/portal/images/capaPrograma/vilasesamo2/personagens.png">
        </a>
       
      </nav>
     
    </div>
    <!--/content-->
  </nav>
  <!--/nav-->