<?
$APPLICATION->IncludeComponent(
   "bitrix:main.include",
   "",
   Array(
      "AREA_FILE_RECURSIVE" => "Y",
      "AREA_FILE_SHOW" => "sect",
      "AREA_FILE_SUFFIX" => (($APPLICATION->getCurDir()=='/')?"main_":"")."footer",      
      "EDIT_TEMPLATE" => ""
   )
);
?>     

</main>

  <div class="container"><hr>  </div>
<footer class="footer py-md-3 py-sm-1">
   <div class="container">
      <div class="row">
         <div class="col-md-5 _addr">
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/footer.left.html.php","AREA_FILE_SHOW" => "file"));?>
         </div>
         <div class="col-md-4 _addr">
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/footer.center.html.php","AREA_FILE_SHOW" => "file"));?>
         </div>
         <div class="col-md-3 text-right  _social">
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/footer.social.html.php","AREA_FILE_SHOW" => "file"));?>
         </div>
      </div>
   </div>
</footer>

</body>
</html>
