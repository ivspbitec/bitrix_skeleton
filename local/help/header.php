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
                  <p><a href="?a=counter">Цифры на главной</a></p>
                  <p><a href="?a=laur">Лауреаты</a></p>
                     <i>Работа с разделом лауреатов</i>
                  </p>
                  <p><a href="?a=special">Специальный гость</a></p>
                  <p><a href="?a=book">Книга</a></p>
                  <p><a href="?a=banner">Баннер на внутренних страницах</a></p>
                  <p><a href="?a=nominations">Номинации</a></p>
                  
                  <?if ($GLOBALS['itConfig']['PERSONAL_ZONE']=='Y'):?>
                  <?endif;?>

               </nav>
            </td>
            <td  valign=top  class="it-help-text"> 