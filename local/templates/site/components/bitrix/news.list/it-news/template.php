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

<? if($arResult["ITEMS"]):?>

<section id="news" class="it-block it-block-inverse it-news"  data-parallax="scroll" data-image-src="/assets/images/news/news_bg.jpg">
   <h2>
      <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/main.news.header.php","AREA_FILE_SHOW" => "file"));?>
   </h2>
   <div class="container">
      <div class="it-news-slider">
         <?foreach($arResult["ITEMS"] as $arItem):?>
         <div class="_item wow fadeInUp animated">
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" title="<?=$arItem["~NAME"]?>" class="img-fluid" />  
            <div class="_info">
               <h3 class="_header">
                  <?=$arItem["~NAME"]?>
               </h3>
               <p class="lead _text">
                  <?=$arItem["~PREVIEW_TEXT"]?>
               </p>
            </div>
         </div>
         <?endforeach;?>
      </div>
   </div>
</section>

<? endif?>