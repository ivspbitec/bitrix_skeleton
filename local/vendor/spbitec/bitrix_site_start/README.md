# bitrix_site_start
Начальные установки для новых проектов на Битрикс

## Установка

1. Скопировать в папку `/local/` файлы 
- **composer.phar**
- **composer.json**
- **composer.sh**
из `/composer/` данного пакета
2. Возможнно потребуется перегенерация oauth ключа для доступа комппозера к репозиториям github https://github.com/settings/tokens
3. Открыть файл composer.json и удалить ненужные пакеты в секции require (кроме **bitrix_site_start** и **bitrix_site_module**)
4. Запустить **composer.sh**
5. Скопировать из `/local/vendor/spbitec/bitrix_site_start/local/` в `/local/` сайта
6. Создать символическую ссылку на `/local/vendor/spbitec/bitrix_site_module/spbitec.lib/` в `/local/modules/`
7. Зайти в панель управления Битрикс и установить появившийся модуль - **Настройки сайта**
