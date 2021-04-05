<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/prolog.php");
require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/prolog_admin_after.php");

CJSCore::Init(array("jquery")); 
$APPLICATION->SetAdditionalCSS("/local/help/site.css"); 


$APPLICATION->setTitle("Документация");
?>

<div class="it-help">
   <table width="100%">
      <tbody>
         <tr>
            <td class="it-help-nav" valign=top>

               <nav>
                  <p><a href="?">Главная страница</a></p>
                  <p><a href="?a=page">Страница</a></p>
                  
                  <?if ($GLOBALS['itConfig']['PERSONAL_ZONE']=='Y'):?>
                  <?endif;?>

               </nav>
            </td>
            <td  valign=top  class="it-help-text"> 