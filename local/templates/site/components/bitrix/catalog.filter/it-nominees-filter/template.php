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

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';

$this->setFrameMode(true);
?>
<?

/*Настройки отображения ----------------------------*/
$show=[];   	
$show['text']=isset($arParams["IT_SHOW_TEXT"])?($arParams["IT_SHOW_TEXT"]=='Y'?true:false):true;
$show['company']=isset($arParams["IT_SHOW_COMPANY"])?($arParams["IT_SHOW_COMPANY"]=='Y'?true:false):true;
$show['year']=isset($arParams["IT_SHOW_YEAR"])?($arParams["IT_SHOW_YEAR"]=='Y'?true:false):true;
 
?>
<div class="it-filter pull-right">
   <form class="form-inline" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>#nominees" method="get">
   
		<? if($show['text']):?>
      <div class="_search my-1 mr-sm-2">
         <div class="_si_icon">
            <img src="/assets/images/icon-search.svg">
         </div> 
         <input 
                type="text" 
                name="<?=$arResult['ITEMS']['NAME']['INPUT_NAME']?>" 
                value="<?=$arResult['ITEMS']['NAME']['INPUT_VALUE']?>" 
                class="form-control js-filter-search px-5" 
                placeholder="Поиск по участникам..."
                >
         <div class="_si_left_close js-filter-search-close">
            <div><i class="fa fa-close"></i></div>                      
         </div> 
      </div>
      <? endif;?>
      
      <? if($show['company']):?>
      <select 
              class="form-control _company js-filter-companys my-1 mr-sm-2 bg-primary text-white" 
              name="<?=$arResult['ITEMS']['PROPERTY_16']['INPUT_NAME']?>" 
              value="<?=$arResult['ITEMS']['PROPERTY_16']['INPUT_VALUE']?>" 

              >
         <option  value="" <?=$arResult['ITEMS']['PROPERTY_16']['INPUT_VALUE']==""?'selected':''?>>Все предприятия</option>

			
			<?
         $arCompanys=[];
         ?>
         <? foreach ($arResult['IT-COMPANYS'] as $arCompay):?>
         <?
         $arCompanys[$arCompay['NAME']]=$arCompay;
         ?>
         <? endforeach;
         ksort($arCompanys);
       
         ?>

         <? foreach ($arCompanys as $arCompay):?>
         <option  value="<?=$arCompay['VALUE']?>" <?=$arResult['ITEMS']['PROPERTY_16']['INPUT_VALUE']==$arCompay['VALUE']?'selected':''?>><?=$arCompay['NAME']?></option>
         <? endforeach;?>

      </select>
      <? endif;?>
      
      <? if($show['year']):?>
      <select 
              name="<?=$arResult['ITEMS']['SECTION_ID']['INPUT_NAME']?>" 
              value="<?=$arResult['ITEMS']['SECTION_ID']['INPUT_VALUE']?>" 

              class="form-control js-filter-years my-1 mr-sm-2 bg-primary text-white " 

              >
         <? foreach ($arResult['IT-YEARS'] as $arSectionsYear):?>
         <option data-url="<?=$arSectionsYear['SECTION_PAGE_URL']?>" value="<?=$arSectionsYear['ID']?>" <?=$arSectionsYear['IT-YEARS-SELECTED']?>><?=$arSectionsYear['NAME']?></option>
         <? endforeach;?>

      </select>
      <? endif;?>
      <input type="hidden" name="set_filter" value="Y" />
   </form>
</div>


<script>
   $(function(){
      var fCheck=function(){
         var $jss=$('.js-filter-search-close');
         var $jsss=$('.js-filter-search');
         if ($jsss.val()){
            $jss.css({opacity:1});
         }else{
            $jss.css({opacity:0});

         }
      };
      $('.js-filter-search').on('keydown change keyup keypress',fCheck);
      fCheck();

      $('.js-filter-search-close').on('click',function(){
         location=".";
      });

      $('.js-filter-years').on('change',function(){
         var formAction=$(this).closest('form').attr('action');
         var formActionQuery=formAction.split('?')[1];
         var formActionModify=$(this).find(':selected').data('url')+'?'+formActionQuery;
         $(this).closest('form').attr('action',formActionModify);
         $(this).closest('form').submit();
      });

      $('.js-filter-companys').on('change',function(){
         $(this).closest('form').submit();
      });


   })
</script>

