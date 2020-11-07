#!/bin/bash

x=0
while true
do


sleep 2s

sass --update --style --no-cache /home/c/cl11880/394/public_html/local/templates/site/scss:/home/c/cl11880/394/public_html/local/templates/site/css
#sass --update --style /home/c/cl11880/394/public_html/local/templates/site/scss:/home/c/cl11880/394/public_html/local/templates/site/css

clear
echo "$x times sass run"
x=$(( $x + 1 ))
done