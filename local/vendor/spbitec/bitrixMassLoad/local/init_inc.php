<?
AddEventHandler("main", "OnBuildGlobalMenu", "GaleriaMenu");
function GaleriaMenu(&$adminMenu, &$moduleMenu){
	$moduleMenu[] = array(
		"parent_menu" => "global_menu_services",
		"section" => "��������",
		"sort"        => 1000,           
		"url"         => "massupload.php", 
		"text"        => '�������� ����������',
		"title"       => '�������� �������� ���������� � �����������',
		"icon"        => "form_menu_icon",
		"page_icon"   => "form_page_icon",
		"items_id"    => "sendmail",
		"items"       => array()  
	);
}
?>