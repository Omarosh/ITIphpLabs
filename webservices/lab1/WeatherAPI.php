<?php
const API_KEY = '5a7bb9cae5157701822107c12bf4a499';
class WeatherAPI implements WeatherAPIInterface
{

  public static function get_cities()
  {
    $str = file_get_contents(__DIR__ . '/city-list.json');
    $json = json_decode($str, true);
    $cities = [];
    foreach ($json as $city)
    {
      if (strtolower($city['country']) === 'eg')
      {
        $cities[] = $city;
      }
    }
    return $cities;
  }

  public static function get_weather($city_id)

  {

    try


    {
      //asd
      $apiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $city_id . "&lang=en&units=metric&APPID=" . API_KEY;
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $apiUrl);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_VERBOSE, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);

      curl_close($ch);
      $data = json_decode($response);
      return $data;
    }
    catch (Exception $exception)
    {
      return json_encode([
        'status' => 501,
        'message' => "Gateway Error"
      ]);
    }
  }
  public static function get_current_time()
  {
    return time();
  }
}
