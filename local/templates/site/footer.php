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


<footer class="it-block it-block-footer">
   <div class="container">
      <div class="_wrapper">

         <div class="d-flex flex-sm-column flex-column flex-md-row justify-content-between align-items-center w-100 _left">
            <div class="_cols d-flex flex-sm-column flex-column flex-md-row justify-content-between align-items-center text-center text-md-left">         	
               <div><?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/footer.copy.php","AREA_FILE_SHOW" => "file"));?></div>
               <div><?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/footer.mail.php","AREA_FILE_SHOW" => "file"));?></div>     
               <div><?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/footer.form.php","AREA_FILE_SHOW" => "file"));?></div>           
            </div>	       
            <div class=" _logo">
               <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("PATH" =>"/include/footer.logo.php","AREA_FILE_SHOW" => "file"));?>
            </div>
         </div>
      </div>
   </div>
</footer>

</body>
</html>
