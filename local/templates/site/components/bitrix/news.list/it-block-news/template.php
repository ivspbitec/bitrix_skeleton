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
<div class="it-block-news">

   <div class="row">
      <div class="col-xl-4 _left">         	
         <a class="it-block-section" href="/news/">
            Новости
         </a>

         <h2>
            Последние новости
         </h2>

         <a href="/news/" class="_more"><img src="/assets/images/main-news-all.svg"> Смотреть все</a>
      </div>

      <div class="col-xl-8">      
         <div class="_cards">
            <?foreach($arResult["ITEMS"] as $arItem):?>      
            <div class="_card" onclick="location='<?=$arItem["DETAIL_PAGE_URL"]?>'">                    
               <div class="it-card-bg"><div style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div></div>     
               <div class="_header">
                  <?=$arItem["NAME"]?>
               </div>
               <div class="_date">
                  <?=$arItem["DISPLAY_ACTIVE_FROM"]?>
               </div>
               <div class="_more">
                  <a class="it-href it-href-more-o-white" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>
               </div>
            </div>
            <?endforeach;?>
         </div>
      </div>


   </div>
</div>