<?

//prc($arParams['IBLOCK_ID']);
//prc($_REQUEST['SECTION_CODE_PATH']);
//prc($arResult );
//prc($arResult['arrProp']);

//$nomFilter['SECTION_ID']=11;
//
//

$sectionsPath=$_REQUEST['SECTION_CODE_PATH'];
$arSectionsPath=explode('/',$_REQUEST['SECTION_CODE_PATH']);
$yearLevel=isset($arParams['IT_YEAR_LEVEL'])?$arParams['IT_YEAR_LEVEL']:1;
$year=$arSectionsPath[$yearLevel];
$rootSectionCode=explode('/',trim($APPLICATION->GetCurPage(),'/'))[0];
$nominaionCode=$arSectionsPath[2];

if ($year && !is_numeric($year) && $arSectionsPath[1]){
   $nominaionCode=$arSectionsPath[1];
   $arSectionsRoot = CIBlockSection::GetList(["NAME"=>"DESC"], array('IBLOCK_ID' => $nominesIblockId,'CODE' => $rootSectionCode), false,["ID","NAME","CODE","SECTION_PAGE_URL"],['nTopCount '=>1])->GetNext();
   $rsSectionLastYear = CIBlockSection::GetList(["NAME"=>"DESC"], array('IBLOCK_ID' => $nominesIblockId,'SECTION_ID' => $arSectionsRoot['ID']), false,["ID","NAME","CODE","SECTION_PAGE_URL"])->GetNext();
   LocalRedirect('/'.$rootSectionCode.'/'.$rsSectionLastYear['CODE'].'/'.$nominaionCode.'/');   
}elseif($year && !is_numeric($year) ){
   LocalRedirect('/');
}




$nominesIblockId=$arParams['IBLOCK_ID'];



$GLOBALS['IT-YEAR']=$year;
 
$arCompanys=[]; 
$arYears=[];  
$selectedYearCode='';
 
$arSectionsRoot = CIBlockSection::GetList(["NAME"=>"DESC"], array('IBLOCK_ID' => $nominesIblockId,'CODE' => $rootSectionCode), false,["ID","NAME","CODE","SECTION_PAGE_URL"],['nTopCount '=>1])->GetNext();
$rsSections = CIBlockSection::GetList(["NAME"=>"DESC"], array('IBLOCK_ID' => $nominesIblockId,'SECTION_ID' => $arSectionsRoot['ID']), false,["ID","NAME","CODE","SECTION_PAGE_URL"]);
while ($arSection = $rsSections->GetNext()){


   if ($year==$arSection['CODE']){   
      $arSection['IT-YEARS-SELECTED']='selected';   
      $selectedYearCode=$arSection['CODE'];
      $GLOBALS['IT-SECTION-YEAR-ID']=$arSection['ID'];
   }  
   $arYears[]=$arSection;
}
$arResult['IT-YEARS']=$arYears;

$arSectionYear = CIBlockSection::GetList(["NAME"=>"DESC"], array('IBLOCK_ID' => $nominesIblockId,'CODE' => $selectedYearCode), false,["ID","NAME","CODE","SECTION_PAGE_URL"],['nTopCount '=>1])->GetNext();
$rsSectionNoms = CIBlockSection::GetList([], array('IBLOCK_ID' => $nominesIblockId,'SECTION_ID' => $arSectionYear['ID']), false,["ID","NAME","CODE"]);

 
while ($arSectionNom = $rsSectionNoms->GetNext()){
	if ($nominaionCode!=$arSectionNom['CODE'] && $nominaionCode) continue;

   
   $companyProp = CIBlockElement::GetProperty($nominesIblockId, $arMember['ID'], array("sort" => "asc"), Array("CODE"=>"company"))->GetNext();
   $companysIblockId=$companyProp['LINK_IBLOCK_ID'];

   $rsMembers = CIBlockElement::GetList(["NAME"=>"ASC"], array(
      'IBLOCK_ID' => $nominesIblockId,
      //'SECTION_ID' => $arSectionNom['ID']
   ),
                                        false, 
                                        false,
                                        [
                                           "ID",
                                           "PROPERTY_company"
                                        ]);
   while ($arMember=$rsMembers->GetNext()){

      if ($arMember["PROPERTY_COMPANY_VALUE"]){
         if (!$arCompanys[$arMember["PROPERTY_COMPANY_VALUE"]]){
            $arCompany = CIBlockElement::GetByID($arMember["PROPERTY_COMPANY_VALUE"])->getNext();
            $arCompanys[$arMember["PROPERTY_COMPANY_VALUE"]]=[
               "ID"=>$arMember["PROPERTY_COMPANY_VALUE"],
               "NAME"=>$arCompany['~NAME'],
               "VALUE"=>$arMember["PROPERTY_COMPANY_VALUE"]
            ];
         }
      }

   }
}

$arResult['IT-COMPANYS']=$arCompanys;

$searchFormAction=$arResult["FORM_ACTION"];
$searchFormAction=array_diff(explode('/',trim($searchFormAction,'/')),['']);
$searchFormAction='/'.implode('/',array_slice($searchFormAction,0,-1)).'/';
if ($searchFormAction){
   $arResult["FORM_ACTION"]=$searchFormAction;
}

