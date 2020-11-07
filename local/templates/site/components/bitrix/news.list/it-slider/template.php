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



<section class="it-block __np it-block-top-slider-wrapper">
   <div class="it-block-top-slider js-top-slider">
      <?foreach($arResult["ITEMS"] as $n=>$arItem):?>

      <div class="_slide _slide_<?=$n?>" style="background-image:url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');">
         <div class="container">
            <div class="_info  d-flex flex-column justify-content-center align-items-start">
               <div class="_header">
                  <?=$arItem['PROPERTIES']['header']['~VALUE']?>
               </div>
               <div class="_lead">
                  <?=$arItem['PROPERTIES']['lead']['~VALUE']?>
               </div>
               <div class="_buttons ">
                  <a class="btn btn-primary btn-arrow" href="<?=$arItem['PROPERTIES']['href']['~VALUE']?>">
                     Подробнее
                  </a>
               </div>
            </div>
         </div>
      </div>
      <?endforeach;?>
   </div>
   <div class="container">
      <div class="_controls d-flex justify-content-center align-items-center">
         <div class="_left_arrow js-slider-prev">
            <img src="/assets/images/top-arrow-left-o.svg">
         </div>
         <div class="_digits">
            <b class='js-slider-current'>01</b> / <span class='js-slider-count'>01</span>
         </div>
         <div class="_right_arrow js-slider-next">
            <img src="/assets/images/top-arrow-right-o.svg">
         </div>
      </div>
   </div>

   <div class="it-scroll-helper js-scroll-helper">
      <div class="_mouse">
         <img src="/assets/images/top-mouse.svg">
      </div>
      <div class="_text">
         СКРОЛЬТЕ  ВНИЗ
      </div>
   </div>
</section>