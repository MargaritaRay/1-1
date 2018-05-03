<?php
//ЛОГИКА ПРИЛОЖЕНИЯ

require __DIR__ . '/classes/GuestBook.php';

$gb = new GuestBook(__DIR__ . '/db.txt', FILE_IGNORE_NEW_LINES);
$data = $gb->getAll();


include __DIR__ . '/temp/index.php';