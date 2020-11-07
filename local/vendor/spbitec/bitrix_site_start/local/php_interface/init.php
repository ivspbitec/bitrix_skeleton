<?

/**
    * Компилируем saas при сбросе кеша
    */
if ($_GET['clear_cache']=='Y'){
   system('sass --update --style compressed --no-cache '.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/scss:'.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/css >/dev/null');
}

/**
    * Глобальные функции
 */
 
function pr($data){
   print_r($data);
}

function prc($data){
   echo "\n";
   echo "\n";
   echo '<script>'."\n";
   echo "\n";

   $arRet=explode("\n",print_r($data,1));
   foreach($arRet as $str){
      $str=str_replace('"','\"',$str);
      $str=str_replace("'",'\'',$str);
      $str=str_replace("\r",'',$str);
      $str=str_replace("\n",'',$str);
      //$str=preg_replace("/\t/",'',$str);
      echo 'console.log("'.$str.'");'."\n";
   }   
   echo "\n";
   echo '</script>';
   echo "\n";
   echo "\n";
}