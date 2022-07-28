<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


$page_class = $APPLICATION->GetDirProperty("page_class");

/**
    * @global CMain $APPLICATION
    * @global CUser $USER
    */
$dir = $APPLICATION->GetCurDir();
$page = $APPLICATION->GetCurPage();
$curLanguage = Bitrix\Main\Application::getInstance()->getContext()->getLanguage(); 

if ($page=='/') $page_class='main';
else $page_class='content';

$assets = \Bitrix\Main\Page\Asset::getInstance();
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="/favicon.ico" type="image/x-icon" />
      <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:100,300,400,500,900&amp;subset=cyrillic" rel="stylesheet">      

      <?

      /**
        * CSS
        */

      $assets->addCss('/local/vendor/kenwheeler/slick/slick/slick.css');
      $assets->addCss('/local/vendor/kenwheeler/slick/slick/slick-theme.css');
      $assets->addCss("/local/vendor/themify_icons/themify-icons.css");
      $assets->addCss("/local/vendor/fortawesome/font-awesome/css/font-awesome.min.css");
      $assets->addCss('/local/vendor/_magic/magic.min.css');
      $assets->addCss('/assets/vendor/custombox/custombox.min.css');
      $assets->addCss('/assets/vendor/lightbox2/css/lightbox.min.css');

      //LOCAL
      $assets->addCss(SITE_TEMPLATE_PATH . '/css/vendor.css');
      $assets->addCss(SITE_TEMPLATE_PATH . '/css/slick-theme.css');

      $assets->addCss(SITE_TEMPLATE_PATH . '/css/custom.css');
      $assets->addCss(SITE_TEMPLATE_PATH . '/css/temp.css');

      /**
        * JS
        */

      //VENDOR      
      $assets->addJs("/assets/vendor/jquery/jquery-3.2.1.min.js");
      $assets->addJs("/assets/vendor/popper/popper.min.js");
      $assets->addJs("/assets/vendor/custombox/custombox.min.js");
      //$assets->addJs('/assets/vendor/masonry/masonry.pkgd.min.js');
      //$assets->addJs('/assets/vendor/multipleFilterMasonry.js');
      $assets->addJs('/assets/vendor/lightbox2/js/lightbox.min.js');

      $assets->addJs("/local/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js");

      $assets->addJs("/assets/vendor/kenwheeler/slick/slick/slick.min.js");
      //      $assets->addJs("/local/vendor/desandro/masonry/dist/masonry.pkgd.min.js");
      $assets->addJs('/assets/vendor/_jquery.smooth-scroll/jquery.smooth-scroll.min.js');
      $assets->addJs('/assets/vendor/_parallax/parallax.min.js');
      $assets->addJs('/assets/vendor/_dynamics/dynamics.min.js');
      $assets->addJs('/assets/vendor/_wow/wow.min.js');

      $assets->addJs('/assets/vendor/collageplus/jquery.collagePlus.min.js');
      $assets->addJs('/assets/vendor/collageplus/jquery.removeWhitespace.min.js');
      $assets->addJs('/assets/vendor/collageplus/jquery.collageCaption.min.js');
      $assets->addCss('/assets/vendor/collageplus/transitions.css');




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


      <!-- Google Tag Manager --> 
      <!-- End Google Tag Manager -->


   </head>
   <body class="page_class_<?=$page_class?>">
      <!-- Google Tag Manager (noscript) -->
      <!-- End Google Tag Manager (noscript) -->
      <main>



         <header >
            <nav class="navbar navbar-expand-lg container it-nav">
               <a class="navbar-brand" href="/"><img src="/assets/images/logo<?=$page_class=='main'?'':'-blue'?>.svg"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
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
   ),false);
                  ?>  
               </div>
            </nav>


         </header>

         <?
         $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
               "AREA_FILE_RECURSIVE" => "Y",
               "AREA_FILE_SHOW" => "sect",
               "AREA_FILE_SUFFIX" => (($APPLICATION->getCurDir()=='/' || $APPLICATION->getCurDir()=='/'.$curLanguage.'/')?"main_":"")."header",      
               "EDIT_TEMPLATE" => ""
            )
         );
         ?>   
