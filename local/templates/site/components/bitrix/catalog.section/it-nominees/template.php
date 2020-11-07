<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();/** @var array $arParams */
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
//prc($arResult);
?>

<section class="it-page-nominees">

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="_items js-more-items">


               <? foreach($arResult["ITEMS"] as $cell=>$arElement):?>
               <?
             
                  $arCompany=$arElement['DISPLAY_PROPERTIES']['company'];
                  $company=$arCompany['LINK_ELEMENT_VALUE'][$arCompany['~VALUE']]['~NAME'];
                  
                  $v=$arElement['PROPERTIES']['users']['VALUE'];
                  $v=$arElement['PROPERTIES']['votes']['VALUE'];
                  $votes=$v?$v:0;
                  
               ?>
               <div class="_item_wrapper">
                  <div class="_item">
                     <dev class="it-nom-header">
                        <div class="_image" title="<?=$arElement['ID']?>">
                        	<? if($arElement["PREVIEW_PICTURE"]["SRC"]):?>
                        	<img class="img-fluid rounded-circle" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>">
                           <? else:?>
                           <img class="img-fluid rounded-circle" src="/assets/images/img-empty.svg">
                           
                           <? endif; ?>
                        </div>
                        <div class="_votes js-vote" data-vote-id="<?=$arElement['ID']?>">
                           <span class="_thumb"><img src="/assets/images/thumb-up.svg"></span>                           
                           <span class='_count js-vote-count'><?=$votes?></span>

                        </div>
                     </dev>
                     <div class="_content">
                        <div class="_name">
                           <?=$arElement["NAME"]?>
                        </div>
                        <div class="_position">
                           <?=$arElement['PROPERTIES']['position']['VALUE'];?>
                        </div>
                        <div class="_company">
                           <?=$company;?>
                        </div>
                        <div class="_descr">
                           <?=$arElement["PROPERTIES"]["achievements"]['VALUE']['TEXT'];?>
                        </div>
                     </div>

                     <div class="_footer">
                       <a class="it-href it-href-more-o" data-toggle="modal" data-target="#nomines-<?=$arElement['ID']?>" -data-modal-target="#nomines-<?=$arElement['ID']?>" href="">Подробнее</a>
                     </div>

                  </div> 
               </div> 
                


               <div  id="nomines-<?=$arElement['ID']?>" class="it-modal modal fade" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-body">

                           <div class="it-modal-close js-close" data-dismiss="modal"  ><img src="/assets/images/modal-close.svg"></div>                  

                           <div class="it-modal-content">
                              <div class="it-nom-card">
                                 <div class="it-nom-header">
                                    <div class="_image" title="<?=$arElement['ID']?>">
                                       <? if($arElement["PREVIEW_PICTURE"]["SRC"]):?>
                                       <img class="img-fluid rounded-circle" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>">
                                       <? else:?>
                                       <img class="img-fluid rounded-circle" src="/assets/images/img-empty.svg">

                                       <? endif; ?>
                                    </div>
                                    <div class="_votes js-vote" data-vote-id="<?=$arElement['ID']?>">
                                       <span class="_thumb"><img src="/assets/images/thumb-up.svg"></span>                           
                                       <span class='_count js-vote-count'><?=$votes?></span>

                                    </div>
                                 </div>     
                                 <div class="_name">
                                    <?=$arElement["NAME"]?>
                                 </div>
                                 <div class="_position">
                                    <?=$arElement['PROPERTIES']['position']['VALUE'];?>
                                 </div>
                                 <div class="_company">
                                    <?=$arElement['PROPERTIES']['company']['VALUE'];?>
                                 </div>

                                 <div class="_descr">
                                    <?=$arElement["~DETAIL_TEXT"]?$arElement["~DETAIL_TEXT"]:$arElement["PROPERTIES"]["achievements"]['VALUE']['TEXT'];?>
                                 </div>
                              </div>                
                           </div>                
                        </div>                
                     </div>                
                  </div>                
               </div>                


               
               <? endforeach;?>
            </div>	

            <?=$arResult["NAV_STRING"]?>
         </div>
      </div>
   </div>
</section>


<?


/*
 * 
 *  <a class="btn u-btn-primary" href="#modal1" data-modal-target="#modal1">
   </a>

   <div id="modal1" class="it-modal">
      <div class="it-modal-close js-modal-close"><i class="fa fa-times"></i></div>
      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
   </div>
   
   */