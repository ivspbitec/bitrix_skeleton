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
//pr($arResult);
?>
<div class="it-page it-page-nominations">
   <div class="it-page-header">              
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1>Номинации</h1>
            </div>  
         </div>
      </div>
   </div>

   <div class="container">
      <div class="row">
         <div class="col-md-12">


            <div class="it-cards">
               <?foreach($arResult["SECTIONS"] as $arItem):?>
               <div class="it-card-wrapper" data-toggle="modal" data-target="#nominations-<?=$arItem['ID']?>">
                  <div class="it-card js-hover-class" data-hover-class="__blue">	
                     <div class="_icon">                     
                        <?=file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arItem['UF_ICON']));?>
                     </div>
                     <div class="_header"><?=$arItem["NAME"]?></div>
                     <div class="_lead">
                        <?=$arItem["UF_DESCR"]?>
                     </div>

                     <div class="_more" >
                        <span class="it-href it-href-more-o">Подробнее</span>
                     </div>
                  </div>  
               </div>






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

               <div class="it-card-wrapper _counter">
                  <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/main.counter.php","AREA_FILE_SHOW" => "file"));?>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>

