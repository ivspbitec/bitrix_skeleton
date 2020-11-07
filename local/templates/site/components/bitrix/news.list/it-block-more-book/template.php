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

// prc($arResult);

$this->setFrameMode(true);
?>

   <div class="it-block-more __book">
      <div class="row _head">
         <div class="col-8">
            <h2 class="_header">История на страницах</h2>
         </div>
         <div class="col-4">
            <div class="_arrows">
               <div class="_left 	js-more-slider-arrow-left"></div>
               <div class="_right 	js-more-slider-arrow-right"></div>
            </div>
         </div>
      </div>

      <div class="it-block-more-slider">
         <div class="js-more-slider">
            <? foreach($arResult["ITEMS"] as $arItem):?>
            <? if ($arParams['IT-ID']==$arItem['ID']) continue;?>

            <div class="_item js-href" data-href="<?=CFile::GetPath($arItem["PROPERTIES"]["pdf"]["~VALUE"])?>" data-href-target="_blank">
               <div class="_image"  title="Полистать книгу">
                  <img class="img-fluid" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
               </div>     
               <div class="_href">               	
                  <a href="<?=CFile::GetPath($arItem["PROPERTIES"]["pdf"]["~VALUE"])?>" target="_blank" title="Полистать книгу">
                  <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/assets/images/icon-book.svg');?>
                  <?=$arItem["NAME"]?>
                  </a>                   
               </div>  
            </div>
            <? endforeach;?>
         </div>
      </div>
</div>