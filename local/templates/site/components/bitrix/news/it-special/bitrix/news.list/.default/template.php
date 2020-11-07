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
?>










<div class="it-cards">

   <?foreach($arResult["ITEMS"] as $arItem):?>
   <div class="it-card-wrapper col-md-4 js-href" data-href="<?=$arItem["DETAIL_PAGE_URL"]?>">
      <div class="it-card-bg"><div style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div></div>     
      <div class="it-card __blue">
         <div class="_date">
         <?=CIBlockFormatProperties::DateFormat(' Y', MakeTimeStamp($arItem['ACTIVE_FROM'], CSite::GetDateFormat()))?>
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
   <?endforeach;?>


   <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
   <br /><?=$arResult["NAV_STRING"]?>
   <?endif;?>
</div>

