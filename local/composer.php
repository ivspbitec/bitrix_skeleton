<?


$last_line = system('cd ./; php -d memory_limit=1024M composer.phar update', $retval);

// Выводим дополнительную информацию
echo '
</pre>
<hr />Последняя строка вывода: ' . $last_line . '
<hr />Код возврата: ' . $retval;
