<?php
/*
 * Created 16.12.2019 10:38
 */

namespace ITTech\Lib;

/**
 * Class Route
 * @package ITTech\Lib
 * @author Alexandr Pokatskiy
 * @copyright ITTechnology
 */
class Route
{
    /**
     * Маршруты GET метода
     * @var array
     */
    private static $request_get = [];

    /**
     * Маршруты POST метода
     * @var array
     */
    private static $request_post = [];

    /**
     * Добавить маршрут
     * @param string $url
     * @param string $obj
     * @param string $func
     * @param string $request
     * @return bool
     */
    public static function set(string $url, string $obj, string $func, string $request = "get"): bool
    {
        $data = ["url" => $url, "controller" => $obj, "method" => $func];

        switch (mb_strtolower($request))
        {
            case "get":
                return self::get_create($data);
                break;
            case "post":
                return self::post_create($data);
                break;
            default: return false;
        }
    }

    /**
     * Выбор маршрута
     * @return false|int|mixed|string
     */
    public static function get()
    {
        $url = parse_url($_SERVER["REQUEST_URI"]);
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $data = self::$request_get;
        } else {
            $data = self::$request_post;
        }

        $result = array_search($url["path"], array_column($data, 'url'));

        if($result === false)
        {
            return $result;
        }

        return $data[$result];
    }

    /**
     * Добавить GET маршрут
     * @param array $data
     * @return bool
     */
    private static function get_create(array $data): bool
    {
        if(array_push(self::$request_get, $data))
        {
            return true;
        }

        return false;
    }

    /**
     * Добавить POST маршрут
     * @param array $data
     * @return bool
     */
    private static function post_create(array $data): bool
    {
        if(array_push(self::$request_post, $data))
        {
            return true;
        }

        return false;
    }

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}
