<!-- BOX PADRAO Noticia -->
<?php if(count($displays)>0): ?>
<div class="box-padrao noticia grid1">
  
  <?php /* if($displays[0]->retriveLabel() != ""): ?>
  <p class="chapeu<?php if($displays[0]->Asset->Category->slug): ?><?php echo " ".$displays[0]->Asset->Category->getSlug() ?><?php endif; ?>"><?php echo $displays[0]->retriveLabel() ?></p>
  <?php endif;*/ ?>
  
  	<?php  if($displays[0]->image != ""): ?>	
      <a href="<?php echo $displays[0]->retriveUrl() ?>" title="<?php echo $displays[0]->getTitle() ?>">
        <!-- img src="<?php echo $displays[0]->retriveImageUrlByImageUsage("image-3-b") ?>" <?php if($displays[0]->Asset->AssetType->getSlug() == "video"):?> class="img-video"<?php endif;?> alt="<?php echo $displays[0]->getTitle() ?>" name="<?php echo $displays[0]->getTitle() ?>" / -->
				<img src="<?php echo $displays[0]->retriveImageUrlByImageUsage("image-3-b") ?>" alt="<?php echo $displays[0]->getTitle() ?>" name="<?php echo $displays[0]->getTitle() ?>" />                	
      </a>
  <?php else: ?>                  
    <?php if($displays[0]->Asset->AssetType->getSlug() == "video"): ?>
        <!--<img src="http://img.youtube.com/vi/<?php echo $displays[0]->Asset->AssetVideo->getYoutubeId() ?>/0.jpg" alt="<?php echo $displays[0]->getTitle() ?>" name="<?php echo $displays[0]->getTitle() ?>" <?php if($displays[0]->Asset->AssetType->getSlug() == "video"):?> class="img-video"<?php endif;?> />-->
        <iframe width="310" height="186" src="http://www.youtube.com/embed/<?php echo $displays[0]->Asset->AssetVideo->getYoutubeId() ?>?wmode=transparent&rel=0" frameborder="0" allowfullscreen style="margin-left:5px;"></iframe>
    
  <?php else: ?>                  
      <a href="<?php echo $displays[0]->retriveUrl() ?>" title="<?php echo $displays[0]->getTitle() ?>">
        <!-- img src="<?php echo $displays[0]->retriveImageUrlByImageUsage("image-3-b") ?>" <?php if($displays[0]->Asset->AssetType->getSlug() == "video"):?> class="img-video"<?php endif;?> alt="<?php echo $displays[0]->getTitle() ?>" name="<?php echo $displays[0]->getTitle() ?>" / -->
				<img src="<?php echo $displays[0]->retriveImageUrlByImageUsage("image-3-b") ?>" alt="<?php echo $displays[0]->getTitle() ?>" name="<?php echo $displays[0]->getTitle() ?>" />	                  		
    <?php endif; ?>
  <?php endif; ?>                 
  

  <a class="titulos" href="<?php echo $displays[0]->retriveUrl() ?>"><?php echo $displays[0]->getTitle() ?></a>
  <p><?php echo $displays[0]->getDescription() ?></p>

</div>
<?php endif; ?>
<!-- BOX PADRAO Noticia -->