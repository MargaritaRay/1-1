<?php

//Начинается запись в буфер, не поподает клиенту
ob_start();

//Попадает в буфер
echo 'Hello!';

//Сохраняется в переменную все что попвло в буфер
$str = ob_get_clean();

//Останавливается буфиизация
ob_end_clean();


echo 'World!';
//вызывается все что сохранилось в буфер
echo $str;