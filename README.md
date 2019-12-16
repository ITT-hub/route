# Простейший маршрутизатор для сайта
Маршрутизатор проверяет зарегестрирован ли маршрут в системе. В случае успеха возвращает массив с данными о классе и методе. Если маршрут не найден возвращается FALSE

### Установка
```bash
composer install
```
### Использование
Подключить автозагрузчик
```php
<?php
include "/vendor/autoload.php";
```

```php
<?php
use ITTech\Lib\Route;

/*
 * Добавить GET маршрут
 */
Route::set("/myurl", "Controller", "MetHod");
/*
 * Добавить POST маршрут
 */

Route::set("/myurl", "Controller", "MetHod", "post");

/*
 * Проверить маршрут
 * @return array("url", "Class", "Method") | false
 */
Route::get();

```