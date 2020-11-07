<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

$cnt=0;
foreach($arResult["ITEMS"] as $arItem){
   if ($arParams['IT-ID']==$arItem['ID']) continue;
   $cnt++;
}
            
            
?>

<? if($cnt):?>

   <div class="it-block-more">
      <div class="row _head">
         <div class="col-md-6">
            <h2 class="_header">Читайте также</h2>
         </div>
         <div class="col-md-6">
            <div class="_arrows">
               <div class="_left 	js-more-slider-arrow-left"></div>
               <div class="_right 	js-more-slider-arrow-right"></div>
            </div>
         </div>
      </div>

      <div class="it-block-more-slider">
         <div class="it-cards js-more-slider">

            <? foreach($arResult["ITEMS"] as $arItem):?>
            <? if ($arParams['IT-ID']==$arItem['ID']) continue;?>
            
            
            <div class="it-card-wrapper js-href" data-href="<?=$arItem["DETAIL_PAGE_URL"]?>">
               <div class="it-card-bg"><div style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div></div>     
               <div class="it-card __blue">
                  <div class="_date">
                    <?=CIBlockFormatProperties::DateFormat('d F Y', MakeTimeStamp($arResult['ACTIVE_FROM'], CSite::GetDateFormat()))?>        
                  </div>

                  <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="_header"><?=$arItem["NAME"]?></a>

                  <div class="_lead"> 
                     <?=$arItem["PREVIEW_TEXT"]?>
                  </div>
                  <? if ($arItem["DETAIL_TEXT"]):?>
                  <div class="_more">
                     <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="it-href it-href-more-o-white">Подробнее</a>
                  </div>
                  <? else:?>
                  <div class="_more">
                     Подробности скоро
                  </div>
                  <? endif;?>

                  
               </div>  
            </div>

            <? endforeach;?>
 
         </div>
      </div>
   </div>
   
<? endif?>