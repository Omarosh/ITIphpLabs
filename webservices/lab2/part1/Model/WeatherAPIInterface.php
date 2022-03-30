<?php
interface WeatherAPIInterface
{
    public static function get_cities();
    public static function get_weather($city_id);
    public static function get_current_time();
}
