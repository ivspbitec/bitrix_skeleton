# bitrixMassLoad
Admin page for mass loading files into infoblock section
Adds global menu item for upload files in services section

# Installation

1. Place directories in root of your bitrix site
2. Edit /bitrix/admin/massupload.php file. Set var $ibId= to appropriate iblockId to upload to.
3. Set appropriate encoding
4. include file /local/init_inc.php into /local/php_intarface/init.php or /bitrix/php_interface/init.php
5. Set appropriate encoding for init_inc.php
