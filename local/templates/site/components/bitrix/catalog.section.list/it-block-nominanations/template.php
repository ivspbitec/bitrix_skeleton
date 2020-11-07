<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

//pr($arResult);
?>

<section class="it-block it-block-nomitnations">

   <div class="_sections-list-wrapper">         	
      <div class="_sections-list">         	
         <div class="_sections-list-inner">         	
            <a class="it-block-section" href="/nominations/">
               Номинации
            </a>
            <ul class="js-main-nominations-nav">

               <? foreach ($arResult['SECTIONS'] as $k=>$arSection):?>
               <li><a href=""><?=$arSection["NAME"]?></a></li>
               <? endforeach;?>
            </ul>
         </div>
      </div>
   </div>
   <div class="_sections-cards">
      <div class="_nom_slider ">
         <div class="it-cards js-main-nominations">
            <? foreach ($arResult['SECTIONS'] as $arSection):?>
            <div class="it-card-wrapper" data-id="<?=$arSection['ID']?>">
               <div class="it-card">
                  <div class="_icon">                     
                     <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arSection['UF_ICON']));?>
                  </div>
                  <div class="_header">
                     <?=$arSection["NAME"]?>
                  </div>
                  <div class="_lead">
                     <?=$arSection['UF_DESCR']?>
                  </div>
             
                  <div class="_more">
                     <a class="it-href it-href-more-o" data-toggle="modal" data-target="#nominations-<?=$arSection['ID']?>">Подробнее</a>
                  </div>
               
               </div>
            </div>
            <? endforeach;?>
            <? foreach ($arResult['SECTIONS'] as $arSection):?>
            <div class="it-card-wrapper" data-id="<?=$arSection['ID']?>" data-ph="1">
               <div class="it-card">
                  <div class="_icon">                     
                     <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arSection['UF_ICON']));?>
                  </div>
                  <div class="_header">
                     <?=$arSection["NAME"]?>
                  </div>
                  <div class="_lead">
                     <?=$arSection['UF_DESCR']?>
                  </div>
                
                  <div class="_more">
                     <a class="it-href it-href-more-o" data-toggle="modal" data-target="#nominations-<?=$arSection['ID']?>">Подробнее</a>
                  </div>
                  
               </div>
            </div>
            <? endforeach;?>
         </div>
      </div>
   </div>

</section>




<? foreach ($arResult['SECTIONS'] as $arItem):?>
<div  id="nominations-<?=$arItem['ID']?>" class="it-modal __nomination modal fade" role="dialog" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-body">

            <div class="it-modal-close js-close" data-dismiss="modal"  ><img src="/assets/images/modal-close.svg"></div>                  
            <div class="it-modal-content">
               <div class="_header">


                  <div class="row">
                     <div class="col-md-2">
                        <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arItem['UF_ICON']));?>
                     </div>
                     <div class="col-md-10 _head">
                        <div class="it-block-section">
                           Номинация
                        </div>

                        <h2>
                           <?=$arItem["NAME"]?>
                        </h2>
                     </div>
                  </div>
               </div>
               <div class="_text">
                  <?=$arItem['DESCRIPTION']?>

               </div>                
               <div class="_buttons">
               
                  <? if(COption::GetOptionString('spbitec.lib', 'vote')=='Y'):?>
                  <a class="btn btn-primary btn-arrow" href="/nominees/<?=$arItem["CODE"]?>/">                     
                     Проголосовать за номинанта
                  </a>
                  <a class="it-href it-href-nomlast" href="/laureates/<?=$arItem["CODE"]?>/">                     
                     Посмотреть лауреатов прошлых лет
                  </a>
                  <? else:;?>
                  <a class="it-href it-href-nomlast" href="/laureates/<?=$arItem["CODE"]?>/">                     
                     Посмотреть лауреатов
                  </a>
                    <? endif;?>
                  
                  
               </div>
            </div>                
         </div>                
      </div>                
   </div>                
</div>
<? endforeach;?>