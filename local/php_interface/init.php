<?
 
require_once __DIR__.'/../vendor/phpmailer5.2.23/PHPMailerAutoload.php';


/** Компилируем saas при сбросе кеша */
if ($_GET['clear_cache']=='Y'){

// exec('sass --update --style compressed --no-cache '.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/scss:'.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/css >/dev/null'
   //pr('sass --update --style --no-cache '.__DIR__.'/../templates/site/scss:'.__DIR__.'/../templates/site/css');
   $ret=exec('sass --update --style --no-cache '.__DIR__.'/../templates/site/scss:'.__DIR__.'/../templates/site/css'
   ,$output 
   ,$return_var 
   );
/* 
  // $ret=system('sass --update --style compressed --no-cache '.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/scss:'.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/css',$return_var);
//  echo('sass --update --style compressed --no-cache '.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/scss:'.$_SERVER['DOCUMENT_ROOT'].'/local/templates/site/css');

   pr('--');
   pr($ret);
   pr($output);
   pr($return_var);
   exit;   */
   
}

/**
    * Глобальные функции
 */
 
function pr($a,$return=false){ //1.4 Выводит все что угодно
   $ret=''; 
   $ret.=$return?'':'<pre>';
   if (!isset($a)) $ret.= "NULL"; 
   if (is_bool($a)) $ret.= $a?"true":"false"; 
   else 
      $ret.=print_r($a,1);
   $ret.=$return?'':'</pre>';	
   if ($return) return $ret; else echo $ret;	 
}

function pra($data){
   global $USER,$APPLICATION;
   if($USER->IsAdmin()){
      pr($data);
   }
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



function num_ending($n,$zero,$one,$two){//1.3 Умные окончания подставляют нужное в зависимости отчисла (Если закончилось на 1,на 2, на 3)
   $n=floor($n);
   if (isset($n)){
      $n='0'.$n;
      $kt=(int)substr($n,-2);		
      $k=(int)(($kt>20)?substr($kt,-1):$kt);

      if ($k==1){
         return ($one);
      }elseif ($k>=2 && $k<=4){
         return ($two);
      }else{
         return ($zero);
      }
   }
   return "";
}
/** Custom mail function (delete prefix _) */
function _custom_mail($to, $subject, $message, $additionalHeaders = ''){
   
   try {
      $mail = new PHPMailer;
      $mail->CharSet = 'UTF-8';
      
      $mail	->setFrom('xxx@xxxx','xxx');
      $mail	->addAddress($to);    
   //   $mail	->addBCC('xxx');    
 //     $mail	->addBCC('xxx');    
//      
//      
      //$mail->isHTML(true);                                  

      $mail->Subject = $subject;
      //$mail->Body    = $message;   
      $mail->msgHTML($message);
      
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPDebug = 0;

 
      $mail->Host = 'ssl://smtp.yandex.ru';
      $mail->Port = 465;
	  $mail->Username = 'xxx';
	  $mail->Password = 'xxx';
 

      $mail->send();
      @file_put_contents(__DIR__.'/../../logs/mail.txt', 'Message to: ' . $to."\r\n\r\n--------------------\r\n",FILE_APPEND);
   } catch (phpmailerException $e) {
     // echo 'error';
    //  echo $e->errorMessage(); //Pretty error messages from PHPMailer
   } catch (Exception $e) {
     // echo 'error';
    //  echo $e->getMessage(); //Boring error messages from anything else!
   }

}
 
/** Проверка авторизации пользователя перед выводом страниц **/
AddEventHandler("main", "OnBeforeProlog", "OnBeforePrologHandlerAuthorise", 50);

function OnBeforePrologHandlerAuthorise(){
   global $USER,$APPLICATION;
   if($APPLICATION->GetCurPage()!='/bitrix/admin/' && $APPLICATION->GetCurPage()!='/auth/' && !$USER->IsAuthorized()){
      //header('location:/cover/');
      $_SESSION['auth_referer'] = $_SERVER['REQUEST_URI'];  
      LocalRedirect("/auth/");
//      header('location:/auth/');      
      exit;
   }
}

AddEventHandler("main", "OnBuildGlobalMenu", "GaleriaMenu");
function GaleriaMenu(&$adminMenu, &$moduleMenu){
   $moduleMenu[] = array(
      "parent_menu" => "global_menu_services",
      "section" => "Рассылка",
      "sort"        => 1000,           
      "url"         => "massupload.php", 
      "text"        => 'Загрузка фотографий',
      "title"       => 'Массовая загрузка фотографий в фотогалерею',
      "icon"        => "form_menu_icon",
      "page_icon"   => "form_page_icon",
      "items_id"    => "sendmail",
      "items"       => array()  
   );
}


AddEventHandler("main", "OnBuildGlobalMenu", "HelpMenu");
function HelpMenu(&$adminMenu, &$moduleMenu){
   $moduleMenu[] = array(
      "parent_menu" => "global_menu_services",
      "section" => "Рассылка",
      "sort"        => 1000,           
      "url"         => "sitehelp.php", 
      "text"        => 'Кейс по работе с сайтом',
      "title"       => 'Кейс по работе с сайтом',
      "icon"        => "form_menu_icon",
      "page_icon"   => "form_page_icon",
      "items_id"    => "sendmail",
      "items"       => array()  
   );
}



