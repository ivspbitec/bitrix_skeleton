#!/bin/bash
cd ./; 
#php -d memory_limit=1024M composer.phar clear-cache
php -d memory_limit=1024M composer.phar update
