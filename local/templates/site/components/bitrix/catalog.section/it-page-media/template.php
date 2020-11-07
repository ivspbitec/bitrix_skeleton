<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?
//prc($arResult) 
?>

 
<div class="container">
   <div class="row">
      <div class="col-md-12"> 
         <div class="_items js-msnry js-more-items">            
            <?	foreach ($arResult['ITEMS'] as $arItem):?>               

               <? if( $arItem['PROPERTIES']['video_url']['~VALUE']):?>

               <?
               $video_url_src=$arItem['PROPERTIES']['video_url']['~VALUE'];
               $video_url_pu=parse_url($video_url_src);
               parse_str($video_url_pu['query'],$video_url_ps);
               $video_url_v=$video_url_ps['v'];
               ?>

               <div 
                    class="_item __size-<?=$arItem['PROPERTIES']['size']['~VALUE']?> it-type-video" 
                    data-video-url="<?=$arItem['PROPERTIES']['video_url']['~VALUE']?>"               
                    data-toggle="modal" 
                    data-target="#video-<?=$arItem['ID']?>"
                    
                    > 
                  <img 
                       src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" 
                       width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" 
                       height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>"
                       />
               </div>


               <? else:?>
               <a 
                  class="_item __size-<?=$arItem['PROPERTIES']['size']['~VALUE']?> it-type-photo" 
                  data-lightbox="roadtrip" 
                  href="<?=$arItem['DETAIL_PICTURE']['SRC']?>"
                  
               > 
                  <img 
                  	src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" 
                     width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>" 
                     height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>"
                       />
               </a>
               <? endif?>
            <? endforeach;?>

         </div>  
         
         <?=$arResult["NAV_STRING"]?>

         <?	foreach ($arResult['ITEMS'] as $arItem):?>
         <? if( $arItem['PROPERTIES']['video_url']['~VALUE']):?>
         <div id="video-<?=$arItem['ID']?>" class="it-modal __video modal fade" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> 
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>  
                  <div class="modal-body">
                     <div class="it-modal-close js-close" data-dismiss="modal"><img src="/assets/images/modal-close.svg"></div>                  
                     <div class="it-modal-content">

                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$video_url_v?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>                
                  </div>                
               </div>                
            </div>                
         </div>
         <? endif?>
         <? endforeach;?>

      </div>  
   </div>
</div>

