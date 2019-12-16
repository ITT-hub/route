<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";

use ITTech\Lib\Route;

Route::set("/content", "Controller", "MetHod");

var_dump(Route::get());

