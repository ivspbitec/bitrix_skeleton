<?
require("header.php");

header('Content-Type: text/html; charset=utf-8');

ini_set('error_reporting', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$article=trim(strip_tags(array_key_exists('a',$_GET)?$_GET['a']:''));
$article=$article?$article:'main';
require(__DIR__."/articles/$article/index.php");
?>
 

<? require("footer.php");?>