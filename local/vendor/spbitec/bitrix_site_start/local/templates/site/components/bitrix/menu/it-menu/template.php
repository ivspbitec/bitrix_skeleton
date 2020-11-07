<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   

   <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
         <? foreach($arResult as $arItem):
         if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
            continue;
         ?> 
         <a class="nav-item nav-link  <?=$arItem["SELECTED"]?'active':''?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
         <?endforeach?>
      </div>
   </div>
</nav>


<?endif?>