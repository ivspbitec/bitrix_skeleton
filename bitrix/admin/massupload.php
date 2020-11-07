<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/prolog.php");
require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/prolog_admin_after.php");

//$APPLICATION->AddHeadScript("/local/vendor/spbitec/bitrixMassLoad/assets/dropzone/dropzone.js"); 
//$APPLICATION->SetAdditionalCSS("/local/vendor/spbitec/bitrixMassLoad/assets/dropzone/dropzone.css"); 
//CJSCore::Init(array("jquery"));

$APPLICATION->setTitle('Массовая загрузка фотографий');


$ibId=$_GET['ibid'];

   $db_list = CIBlockSection::GetList(Array(), array('IBLOCK_ID'=>$ibid), true);
   while($cat=$db_list->getNext()){
      $cats[$cat['ID']]=$cat['NAME'];
      if (!$sect) $sect=$cat['ID'];
   }

?>

<p>
   Для загрузки файлов выберите альбом и перетащите файлы на зону загрузки
</p>

<p>
   <b>Альбом для загрузки</b>
</p>
<select id="cats">
   <? foreach ($cats as $id=>$cat):?>
   <option value="<?=$id?>"><?=$cat?></option>
   <? endforeach ?>
</select>
<br><br>
<p>
   <b>Зона загрузки</b>
</p>

<!-- Change /upload-target to your upload address -->
<form action="/local/vendor/spbitec/bitrixMassLoad/upload.php" class="dropzone">
   <input type="hidden" id="sect" name="sect" value="<?=$sect?>">
</form>

<script>
   $(function(){
      $('#cats').on('change', function(e){
         $('#sect').val($('#cats option:selected').val());
      });
   });

</script>

<?
   require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_admin.php");
