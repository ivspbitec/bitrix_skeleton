<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
 

$page_class = $APPLICATION->GetDirProperty("page_class");

/**
    * @global CMain $APPLICATION
    * @global CUser $USER
    */
$dir = $APPLICATION->GetCurDir();
$page = $APPLICATION->GetCurPage();

$assets = \Bitrix\Main\Page\Asset::getInstance();
?><!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="/favicon.ico" type="image/x-icon" />
      <?

      /**
        * CSS
        */

      $assets->addCss('/local/vendor/kenwheeler/slick/slick/slick.css');
      $assets->addCss(SITE_TEMPLATE_PATH . '/css/slick-theme.css');
      $assets->addCss("/local/vendor/themify_icons/themify-icons.css");

      //LOCAL
      $assets->addCss(SITE_TEMPLATE_PATH . '/css/vendor.css');
      $assets->addCss(SITE_TEMPLATE_PATH . '/css/custom.css');

      /**
        * JS
        */
 
      //VENDOR
      $assets->addJs("https://code.jquery.com/jquery-3.2.1.min.js");
      $assets->addJs("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js");
      $assets->addJs("/local/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js");

      $assets->addJs("/local/vendor/kenwheeler/slick/slick/slick.min.js");
      $assets->addJs("/local/vendor/desandro/masonry/dist/masonry.pkgd.min.js");

      //LOCAL
      $assets->addJs(SITE_TEMPLATE_PATH . '/js/main.js');


      /**
        * BITRIX ->ShowHead()
        */
      /*   $APPLICATION->ShowMeta("robots", false);
      $APPLICATION->ShowMeta("keywords", false);
      $APPLICATION->ShowMeta("description", false);
      $APPLICATION->ShowLink("canonical", null);
      $APPLICATION->ShowCSS(true);
      $APPLICATION->ShowHeadStrings();*/
      $APPLICATION->ShowHead();
      ?>
      <title><? $APPLICATION->ShowTitle() ?></title>

      <?$APPLICATION->ShowPanel();?> 
   </head>
   <body class="page_class_<?=$page_class?>">
      <?
      $APPLICATION->IncludeComponent("bitrix:menu", "it-menu", Array(
         "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
         "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
         "DELAY" => "N",	// Откладывать выполнение шаблона меню
         "MAX_LEVEL" => "1",	// Уровень вложенности меню
         "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
            0 => "",
         ),
         "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
         "MENU_CACHE_TYPE" => "A",	// Тип кеширования
         "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
         "MENU_THEME" => "site",	// Тема меню
         "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
         "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
      ),
                                     false
                                    );
      ?> 
      <main role="main" >

         <?
         $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
               "AREA_FILE_RECURSIVE" => "Y",
               "AREA_FILE_SHOW" => "sect",
               "AREA_FILE_SUFFIX" => (($APPLICATION->getCurDir()=='/' || $APPLICATION->getCurDir()=='/en/')?"main_":"")."header",      
               "EDIT_TEMPLATE" => ""
            )
         );
         ?>      

