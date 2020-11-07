<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
 

$curPage=$APPLICATION->GetCurPage();
$currentSection='';
$firstSection='';
foreach ($arResult['SECTIONS'] as $arSection){
	if (!$firstSection) $firstSection=$arSection;
   if ($arSection['SECTION_PAGE_URL']==$curPage){
      $currentSection=$arSection;
   }
}
if ($currentSection && $arParams['ADD_SECTIONS_CHAIN']=='Y'){
	$APPLICATION->AddChainItem($currentSection["NAME"],  $currentSection['SECTION_PAGE_URL'] );
}

if (!$currentSection){

	//LocalRedirect($firstSection);
}

$showAll=isset($arParams['IT-SHOW-ALL'])?$arParams['IT-SHOW-ALL']:false;
 
?>




<a name="nominees"></a>
<section class="it-page-nomitnations-nav">
   <div class="container">
      <div class="_sections">    
         <? foreach ($arResult['SECTIONS'] as $arSection):?>
            <? if ($arSection["UF_NOVOTE"]=='1' || $showAll):?>
            <a class="_section <?=$currentSection['ID']==$arSection['ID']?'active':''?>" href="<?=$arSection['SECTION_PAGE_URL']?>#nominees">
               <div class="_icon">               
                  <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arSection['UF_ICON']));?>
               </div>              
               <div class="_more">
                  <?=$arSection["NAME"]?>
               </div>
            </a>
            <? endif;?>
         <? endforeach;?>
      </div>
   </div>
</section>



