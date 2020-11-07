<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("SiteTitle"); 
?>





 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"it-slider",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ALLOW_MULTI_SELECT" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "Data",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => "",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("header","lead","href",""),
		"ROOT_MENU_TYPE" => "top",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_EXT" => "N"
	)
);?>



<section class="it-block __np it-block-about" >
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-6 _image" style="background-image:url(/assets/images/about.jpg)">         	
         </div>
         <div class="col-lg-6 _info">
            <div class="it-container-50">
               <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/main.about.right.php","AREA_FILE_SHOW" => "file"));?>
            </div>
         </div>
      </div>
   </div>
</section>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "it-block-nominanations", Array(
	"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
		"FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
		"IBLOCK_ID" => "1",	// Инфоблок
		"IBLOCK_TYPE" => "Data",	// Тип инфоблока
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_FIELDS" => array(	// Поля разделов
			0 => "NAME",
			1 => "DESCRIPTION",
			2 => "PICTURE",
			3 => "",
		),
		"SECTION_ID" => "25",	// ID раздела
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства разделов
			0 => "UF_ICON",
			1 => "UF_DESCR",
			2 => "UF_NOVOTE",
		),
		"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
		"TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
		"VIEW_MODE" => "LINE",	// Вид списка подразделов
	),
	false
);?>


<section class="it-block __np it-block-nomitnats">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 _info">  
            <div class="it-container-50">
               <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/main.nomitnats.left.php","AREA_FILE_SHOW" => "file"));?>
            </div>
         </div>
         <div class="col-md-6 _image" style="background-image:url(/assets/images/main-win.jpg)">
         </div>
      </div>
   </div>
</section>




<section class="it-block it-block-newscounter">
 
      <div class="container">
      
         <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/main.counter.php","AREA_FILE_SHOW" => "file"));?>
       



         <?$APPLICATION->IncludeComponent("bitrix:news.list", "it-block-news", Array(
   "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
   "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
   "AJAX_MODE" => "N",	// Включить режим AJAX
   "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
   "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
   "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
   "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
   "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
   "CACHE_GROUPS" => "Y",	// Учитывать права доступа
   "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
   "CACHE_TYPE" => "A",	// Тип кеширования
   "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
   "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
   "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
   "DISPLAY_DATE" => "Y",	// Выводить дату элемента
   "DISPLAY_NAME" => "Y",	// Выводить название элемента
   "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
   "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
   "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
   "FIELD_CODE" => array(	// Поля
      0 => "",
      1 => "",
   ),
   "FILTER_NAME" => "",	// Фильтр
   "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
   "IBLOCK_ID" => "2",	// Код информационного блока
   "IBLOCK_TYPE" => "Data",	// Тип информационного блока (используется только для проверки)
   "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
   "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
   "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
   "NEWS_COUNT" => "2",	// Количество новостей на странице
   "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
   "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
   "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
   "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
   "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
   "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
   "PAGER_TITLE" => "Новости",	// Название категорий
   "PARENT_SECTION" => "",	// ID раздела
   "PARENT_SECTION_CODE" => "",	// Код раздела
   "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
   "PROPERTY_CODE" => array(	// Свойства
      0 => "",
      1 => "",
   ),
   "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
   "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
   "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
   "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
   "SET_STATUS_404" => "N",	// Устанавливать статус 404
   "SET_TITLE" => "N",	// Устанавливать заголовок страницы
   "SHOW_404" => "N",	// Показ специальной страницы
   "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
   "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
   "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
   "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
   "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
),
                                          false
                                         );?> 

      </div>
 
</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>