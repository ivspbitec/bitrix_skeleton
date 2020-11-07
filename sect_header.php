<div class="it-breadcrumbs">
   <div class="container">


      <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "it-bc", Array(
   "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
   "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
   "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                       false
                                      );?>

      
   </div>
</div>  