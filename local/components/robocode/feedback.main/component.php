<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

if (!empty($_POST)){
//pr($_POST);
//exit;
}



$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
	$arParams["EVENT_NAME"] = "FEEDBACK_FORM";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if($arParams["EMAIL_TO"] == '')
	$arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
	$arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]))
{
	$arResult["ERROR_MESSAGE"] = array();
	if(check_bitrix_sessid())
	{
		if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
		{
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["names"]) <= 1)
				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");		
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["email"]) <= 1)
				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_EMAIL");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["phone"]) <= 5)
				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["message"]) <= 3)
				$arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_MESSAGE");
		}
		if(strlen($_POST["email"]) > 1 && !check_email($_POST["email"]))
			$arResult["ERROR_MESSAGE"][] = GetMessage("MF_EMAIL_NOT_VALID");
      
      $canSend=true;
      
      if($arParams["USE_CAPTCHA"] == "Y"){
         // Проверка рекапчи
         $f=fopen('recaptcha.log','a');


			if ($_POST['g-recaptcha-response']){
            $ch = curl_init();


				$recptUrl="secret=".$arParams['RECAPTCHA_INPUTSECRET']."&response={$_POST['g-recaptcha-response']}&remoteip={$_SERVER['REMOTE_ADDR']}";

            curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $recptUrl);

            fwrite($f, date('d.m.Y H:i:s').": {$recptUrl}\n");

            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $reCaptchaResult = curl_exec ($ch);

            fwrite($f, date('d.m.Y H:i:s').": ".$reCaptchaResult."\n");

            curl_close ($ch);

            $reCaptchaResult=json_decode($reCaptchaResult, true);

            if ($reCaptchaResult['success']!=true){
               $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
               $canSend=false;
            }
         } else {
            $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
            $canSend=false;
            fwrite($f, date('d.m.Y H:i:s').": request without g-recaptcha-response. Blocked.\n");
         }
         
         fclose($f);

      }			

      if(empty($arResult["ERROR_MESSAGE"])){
         $arFields = Array(
            "AUTHOR" => $_POST["names"],
            "AUTHOR_EMAIL" => $_POST["email"],
            "AUTHOR_PHONE" => $_POST["phone"],
            "EMAIL_TO" => $arParams["EMAIL_TO"],
            "TEXT" => $_POST["message"],
         );
         if(!empty($arParams["EVENT_MESSAGE_ID"])){
            foreach($arParams["EVENT_MESSAGE_ID"] as $v)
               if(IntVal($v) > 0)
                  CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", IntVal($v));
         }
         else
            CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
         $_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["names"]);
         $_SESSION["MF_EMAIL"] = htmlspecialcharsbx($_POST["email"]);
         LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
      }
		
      
		$arResult["MESSAGE"] = htmlspecialcharsbx($_POST["message"]);
		$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["names"]);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_POST["email"]);
		$arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_POST["phone"]);
	}
	else
		$arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
}
elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"])
{
	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if(empty($arResult["ERROR_MESSAGE"]))
{
	if($USER->IsAuthorized())
	{
		$arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($USER->GetEmail());
	}
	else
	{
		if(strlen($_SESSION["MF_NAME"]) > 0)
			$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);
		if(strlen($_SESSION["MF_EMAIL"]) > 0)
			$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
	}
}

if($arParams["USE_CAPTCHA"] == "Y")
	$arResult["capCode"] =  htmlspecialcharsbx($APPLICATION->CaptchaGetCode());

$this->IncludeComponentTemplate();
