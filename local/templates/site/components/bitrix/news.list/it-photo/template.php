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


<div class="it-photo-slider">

   <?foreach($arResult["ITEMS"] as $arItem):?>
   <div class="_item">
      <img border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
           width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
           height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
           alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
           title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
           class="img-fluid"
           /> 
      <div class="_info text-center d-flex flex-column justify-content-center align-items-center">
         <div class="_icon mb-3">
				<i class="fa fa-clock-o"></i>
         </div>
         <div class="_text">
            <?=$arItem['NAME']?>
         </div>
      </div>
   </div>
   <?endforeach;?>

</div>