<?php

//Update these variables
$location = "[Your Location ID]"; //The location name used in your table entry
$latlong = "[37.8267,-122.4233]"; //The latitude and longitude of your location

// Database credentials.
    $servername = "[MySQL Server]";
    $username = "[MySQL User]";
    $dbname = "[MySQL Database]";
    $password = "[MySQL Password]";
// Create connection.
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

//Get the latest weather data
$url = "https://api.darksky.net/forecast/5473d8c7ed504d607e67bfdcddc2f2e0/" . $latlong;
$forecast = json_decode(file_get_contents($url));
$day0_weekday_short = date("D", $forecast->daily->data[0]->time);
$day0_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[0]->icon . ".png";
$day0_high = $forecast->daily->data[0]->temperatureHigh;
$day0_high = !empty($day0_high) ? "'$day0_high'" : "NULL";
$day0_low = $forecast->daily->data[0]->temperatureLow;
$day0_low = !empty($day0_low) ? "'$day0_low'" : "NULL";
$day1_weekday_short = date("D", $forecast->daily->data[1]->time);
$day1_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[1]->icon . ".png";
$day1_high = $forecast->daily->data[1]->temperatureHigh;
$day1_high = !empty($day1_high) ? "'$day1_high'" : "NULL";
$day1_low = $forecast->daily->data[1]->temperatureLow;
$day1_low = !empty($day1_low) ? "'$day1_low'" : "NULL";
$day2_weekday_short = date("D", $forecast->daily->data[2]->time);
$day2_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[2]->icon . ".png";
$day2_high = $forecast->daily->data[2]->temperatureHigh;
$day2_high = !empty($day2_high) ? "'$day2_high'" : "NULL";
$day2_low = $forecast->daily->data[2]->temperatureLow;
$day2_low = !empty($day2_low) ? "'$day2_low'" : "NULL";
$day3_weekday_short = date("D", $forecast->daily->data[3]->time);
$day3_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[3]->icon . ".png";
$day3_high = $forecast->daily->data[3]->temperatureHigh;
$day3_high = !empty($day3_high) ? "'$day3_high'" : "NULL";
$day3_low = $forecast->daily->data[3]->temperatureLow;
$day3_low = !empty($day3_low) ? "'$day3_low'" : "NULL";
$day4_weekday_short = date("D", $forecast->daily->data[4]->time);
$day4_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[4]->icon . ".png";
$day4_high = $forecast->daily->data[4]->temperatureHigh;
$day4_high = !empty($day4_high) ? "'$day4_high'" : "NULL";
$day4_low = $forecast->daily->data[4]->temperatureLow;
$day4_low = !empty($day4_low) ? "'$day4_low'" : "NULL";
$day5_weekday_short = date("D", $forecast->daily->data[5]->time);
$day5_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[5]->icon . ".png";
$day5_high = $forecast->daily->data[5]->temperatureHigh;
$day5_high = !empty($day5_high) ? "'$day5_high'" : "NULL";
$day5_low = $forecast->daily->data[5]->temperatureLow;
$day5_low = !empty($day5_low) ? "'$day5_low'" : "NULL";
$day6_weekday_short = date("D", $forecast->daily->data[6]->time);
$day6_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[6]->icon . ".png";
$day6_high = $forecast->daily->data[6]->temperatureHigh;
$day6_high = !empty($day6_high) ? "'$day6_high'" : "NULL";
$day6_low = $forecast->daily->data[6]->temperatureLow;
$day6_low = !empty($day6_low) ? "'$day6_low'" : "NULL";
$day7_weekday_short = date("D", $forecast->daily->data[7]->time);
$day7_icon_url = "https://darksky.net/images/weather-icons/" . $forecast->daily->data[7]->icon . ".png";
$day7_high = $forecast->daily->data[7]->temperatureHigh;
$day7_high = !empty($day7_high) ? "'$day7_high'" : "NULL";
$day7_low = $forecast->daily->data[7]->temperatureLow;
$day7_low = !empty($day7_low) ? "'$day7_low'" : "NULL";

//Update in the db
if (isset($day0_weekday_short, $day0_icon_url)) {
    $newdate= date('Y-m-d H:i:s');
    $sql = "UPDATE weather SET last_update = '$newdate', day0_weekday_short = '$day0_weekday_short', day0_icon_url = '$day0_icon_url', day0_high = $day0_high, day0_low = $day0_low, day1_weekday_short = '$day1_weekday_short', day1_icon_url = '$day1_icon_url', day1_high = $day1_high, day1_low = $day1_low, day2_weekday_short = '$day2_weekday_short', day2_icon_url = '$day2_icon_url', day2_high = $day2_high, day2_low = $day2_low, day3_weekday_short = '$day3_weekday_short', day3_icon_url = '$day3_icon_url', day3_high = $day3_high, day3_low = $day3_low, day4_weekday_short = '$day4_weekday_short', day4_icon_url = '$day4_icon_url', day4_high = $day4_high, day4_low = $day4_low, day5_weekday_short = '$day5_weekday_short', day5_icon_url = '$day5_icon_url', day5_high = $day5_high, day5_low = $day5_low, day6_weekday_short = '$day6_weekday_short', day6_icon_url = '$day6_icon_url', day6_high = $day6_high, day6_low = $day6_low, day7_weekday_short = '$day7_weekday_short', day7_icon_url = '$day7_icon_url', day7_high = $day7_high, day7_low = $day7_low WHERE location = $location";
    if (mysqli_query($conn, $sql)) {
        //echo "OK";
    } else {
        echo "Fail: " . $sql . "<br/>" . mysqli_error($conn);
    }
}

?>