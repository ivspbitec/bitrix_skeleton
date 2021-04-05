<?
require("header.php");

header('Content-Type: text/html; charset=utf-8');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$article=trim(strip_tags(array_key_exists('a',$_GET)?$_GET['a']:''));
if ($article){
    
   require(__DIR__."/articles/$article/index.php");
   exit;
}
 
?>
 
<h1>Документация по работе с сайтом<br>
   SiteTitle</h1>
Версия 1.0, Последнее обновление 4.3.2020<br>
<br>
<br>
<h2>
Блок - О церемонии
</h2>

<p>
Самостоятельно добавлять ссылку соответствующую макету можно <a href="http://xn--80ajgcfke1bvbcf0co1e.xn--p1ai/bitrix/admin/fileman_html_edit.php?path=%2Finclude%2Fmain.about.right.php&site=s1&lang=ru&&amp;filter=Y&amp;set_filter=Y">по ссылке</a>. 
<br>
Для того что бы ссылка вновь стала оторбажаться следует убрать из ее свойств класс d-none
</p>

<p>
Однако необходимо редактировать данные в режиме исходного кода что бы не нарушить отображение сайта 
</p>
<p>
Самостоятельно добавлять ссылку соответствующую макету можно <a href="http://xn--80ajgcfke1bvbcf0co1e.xn--p1ai/bitrix/admin/fileman_html_edit.php?path=%2Finclude%2Fmain.about.left.php&site=s1&lang=ru&&amp;filter=Y&amp;set_filter=Y">по ссылке</a>
предварительно загрузив его в папку <a href="http://xn--80ajgcfke1bvbcf0co1e.xn--p1ai/bitrix/admin/fileman_admin.php?PAGEN_1=&SIZEN_1=20&lang=ru&site=s1&path=%2Fupload%2Fimages&show_perms_for=0">/upload/images/</a>
</p>

<br>
<h2>
Блок - Номинанты
</h2>
<p>
Менять название блока и пункта меню «Номинанты 2019» на «Номинанты 2020» можно <a href="http://xn--80ajgcfke1bvbcf0co1e.xn--p1ai/bitrix/admin/fileman_html_edit.php?path=%2Finclude%2Fmain.nomitnats.left.php&site=s1&lang=ru&&amp;filter=Y&amp;set_filter=Y">по ссылке</a>
</p>
<p>
Менять изображение блока «Номинанты 2019» можно <a href="http://xn--80ajgcfke1bvbcf0co1e.xn--p1ai/bitrix/admin/fileman_html_edit.php?path=%2Finclude%2Fmain.nomitnats.right.php&site=s1&lang=ru&&amp;filter=Y&amp;set_filter=Y">по ссылке</a>
предварительно загрузив его в папку <a href="http://xn--80ajgcfke1bvbcf0co1e.xn--p1ai/bitrix/admin/fileman_admin.php?PAGEN_1=&SIZEN_1=20&lang=ru&site=s1&path=%2Fupload%2Fimages&show_perms_for=0">/upload/images/</a>
</p>
  
 
  
  

<br>
<?require("footer.php");?>
