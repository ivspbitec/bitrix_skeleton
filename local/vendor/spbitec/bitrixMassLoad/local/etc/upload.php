<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$photos = array();

$photos[$i]["name"] = $_FILES["file"]["name"];
$photos[$i]["type"] = $_FILES["file"]["type"];
$photos[$i]["tmp_name"] = $_FILES["file"]["tmp_name"];
$photos[$i]["error"] = $_FILES["file"]["error"];
$photos[$i]["size"] = $_FILES["file"]["size"];

if(count($photos)){

   $name = '';
   $db_list = CIBlockSection::GetList(Array(), array('IBLOCK_ID'=>$_REQUEST["ib"],"ID"=>$_REQUEST["sect"]), true);
   while($ar_result = $db_list->GetNext()){
      $name = $ar_result['NAME'];
   }
   
   $cnt = CIBlockSection::GetSectionElementsCount($_REQUEST["sect"]);
   $photos = array_reverse($photos);
   foreach($photos as $key=>$photo){
      $item = new CIBlockElement;
      $PROP = array();
      $arLoadProductArray = Array(
         //"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
         "IBLOCK_SECTION_ID" => $_REQUEST["sect"],          // элемент лежит в корне раздела
         "IBLOCK_ID"      => $_REQUEST["ib"],
         "PROPERTY_VALUES"=> $PROP,
         "NAME"           => ($cnt+$key+1),
         "ACTIVE"         => "Y",            // активен
         "ACTIVE_FROM"    => ConvertTimeStamp(time(), "FULL"),
         "PREVIEW_PICTURE" => $photo,
         "DETAIL_PICTURE" => $photo
      );
      
      $PRODUCT_ID = $item->Add($arLoadProductArray);    
   }

}
