<?php
spl_autoload_register(function ($class)
{
    include "$class.php";
});


$cityId = $_GET["city"] ?? "360542";
$cities = WeatherAPI::get_cities();
$data = WeatherAPI::get_weather($cityId);
$currentTime = WeatherAPI::get_current_time();

?>

<!doctype html>
<html>

<head>
    <title>LAB1
    </title>
</head>
<style>
    .choose {
        border: solid;
        padding: 10px;
        margin-bottom: 5px;
        display: block;
    }

    .report-container {
        font-size: 20px;
        border: solid;
        padding: 10px;
        margin-bottom: 5px;
        display: block;
    }
</style>

<body>
    <h1>Weather Forecast</h1>
    <div class="choose">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get" id="cityForm">
            <label for="city">Choose City</label> <br />
            <select name="city" id="city">

                <?php for ($i = 0; $i < count($cities); $i++)
                { ?>
                    <option value="<?= $cities[$i]['id'] ?>"> <?= $cities[$i]['name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit">Show Weather</button>
        </form>
    </div>
    <hr>
    <div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y", $currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
</body>

</html>