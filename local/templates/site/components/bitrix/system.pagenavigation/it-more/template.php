<?
/*	Шаблон постраничного вывода
 * 
 * @version 1.0
 * 
 * 1. Добавить класс js-more-items к списку
 * 2. Задапть параметры 
 * 
 * 	IT-PAGER-SUFFIX	-	Название элементов (Ex: номинантов)
 * 
 * */
 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$nextPageUrl='';
$nextCount=$arResult['NavRecordCount']-$arResult['NavLastRecordShow'];

if ($Parent=$component->GetParent()){
	$arParams=$Parent->arParams;
}

$suffix='';
if ($arParams){  
   if (is_array($arParams['IT-PAGER-SUFFIX'])){
      $suffix=num_ending($nextCount,$arParams['IT-PAGER-SUFFIX'][0],$arParams['IT-PAGER-SUFFIX'][1],$arParams['IT-PAGER-SUFFIX'][2]);
   }elseif($arParams['IT-PAGER-SUFFIX']){
      $suffix=$arParams['IT-PAGER-SUFFIX'];
   }
}


$this->setFrameMode(false);



//[NavRecordCount] => 15 [NavPageCount] => 2 [NavPageNomer] => 1 [NavPageSize] => 10
if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]){
   $nextPageUrl=$arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
}

?>

<? if($nextPageUrl):?>
 
<div class="it-more js-more" data-items=".js-more-items" data-next-url="<?=$nextPageUrl?>">
   <div class="_button">
      <div class="_image">

      </div>
      <div class="_label">
         <span>Показать еще <?=$nextCount?> <?=$suffix?></span>
      </div>
   </div>
</div>
 
<? endif;?>