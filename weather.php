<?php

//Check if we have recent weather data in the DB, if not get it
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
    
    //Determine how many minutes it's been since the last time the forecast has been updated
    $lastupdate = mysqli_query($conn, "SELECT last_update FROM weather WHERE location = '[Your Unique Location ID]' ORDER BY id LIMIT 1");
    while($row = mysqli_fetch_assoc($lastupdate)) { $last = $row['last_update']; };
    $lastdt = new DateTime($last);
    $now = new DateTime("now");
    $interval = date_diff($lastdt, $now);
    $minutes = $interval->days * 24 * 60;
    $minutes += $interval->h * 60;
    $minutes += $interval->i;
//    echo $minutes.' minutes since last update<br>';
    
    //If the data is stale, get new data and update the record
    if ($minutes > 15) {
        //The API Key and URL below is from the Weather Underground documentation, you will need to replace the key and location
        $json_string = file_get_contents("http://api.wunderground.com/api/e2aebab3a3ed8273/forecast/q/CA/San_Francisco.json");
        $parsed_json = json_decode($json_string);
        $conditions = $parsed_json->{'forecast'}->{'txt_forecast'}->{'forecastday'};
        $forecast = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'};
        $day0_weekday_short = $forecast[0]->date->weekday_short;
        $day0_icon_url = $forecast[0]->icon_url;
        $day0_high = $forecast[0]->high->fahrenheit;
        $day0_low = $forecast[0]->low->fahrenheit;
        $day1_weekday_short = $forecast[1]->date->weekday_short;
        $day1_icon_url = $forecast[1]->icon_url;
        $day1_high = $forecast[1]->high->fahrenheit;
        $day1_low = $forecast[1]->low->fahrenheit;
        $day2_weekday_short = $forecast[2]->date->weekday_short;
        $day2_icon_url = $forecast[2]->icon_url;
        $day2_high = $forecast[2]->high->fahrenheit;
        $day2_low = $forecast[2]->low->fahrenheit;
        $day3_weekday_short = $forecast[3]->date->weekday_short;
        $day3_icon_url = $forecast[3]->icon_url;
        $day3_high = $forecast[3]->high->fahrenheit;
        $day3_low = $forecast[3]->low->fahrenheit;
                
        //Update in the db
        $newdate= date('Y-m-d H:i:s');
        $sql = "UPDATE weather SET last_update = '$newdate', day0_weekday_short = '$day0_weekday_short', day0_icon_url = '$day0_icon_url', day0_high = '$day0_high', day0_low = '$day0_low', day1_weekday_short = '$day1_weekday_short', day1_icon_url = '$day1_icon_url', day1_high = '$day0_high', day1_low = '$day1_low', day2_weekday_short = '$day2_weekday_short', day2_icon_url = '$day2_icon_url', day2_high = '$day2_high', day2_low = '$day2_low', day3_weekday_short = '$day3_weekday_short', day3_icon_url = '$day3_icon_url', day3_high = '$day3_high', day3_low = '$day3_low' WHERE location = '[Your Unique Location ID]'";
        if (mysqli_query($conn, $sql)) {
            //echo "OK";
        } else {
            echo "Fail: " . $sql . "<br/>" . mysqli_error($conn);
        }
    }
    
    //Get the latest from the DB and set variables to be displayed
    $weatherdata = mysqli_query($conn, "SELECT * FROM weather WHERE location = '[Your Unique Location ID]' ORDER BY id LIMIT 1");
    while($row = mysqli_fetch_assoc($weatherdata)) { 
        $location = $row['location'];
        $day0_weekday_short = $row['day0_weekday_short'];
        $day0_icon_url = $row['day0_icon_url'];
        $day0_high = $row['day0_high'];
        $day0_low = $row['day0_low'];
        $day1_weekday_short = $row['day1_weekday_short'];
        $day1_icon_url = $row['day1_icon_url'];
        $day1_high = $row['day1_high'];
        $day1_low = $row['day1_low'];
        $day2_weekday_short = $row['day2_weekday_short'];
        $day2_icon_url = $row['day2_icon_url'];
        $day2_high = $row['day2_high'];
        $day2_low = $row['day2_low'];
        $day3_weekday_short = $row['day3_weekday_short'];
        $day3_icon_url = $row['day3_icon_url'];
        $day3_high = $row['day3_high'];
        $day3_low = $row['day3_low'];
    };

    //Close connection
    mysqli_close($conn);
?>

    <table align="center">
        <tr>
            <td class="fct_cell">
                <?php
                    echo $day0_weekday_short;
                    echo "<br><img src='" . $day0_icon_url . "'><br>";
                    echo $day0_high . " / " .$day0_low;
                ?>
            </td>
            <td class="fct_cell">
                <?php
                    echo $day1_weekday_short;
                    echo "<br><img src='" . $day1_icon_url . "'><br>";
                    echo $day1_high . " / " .$day1_low;
                ?>
            </td>
            <td class="fct_cell">
                <?php
                    echo $day2_weekday_short;
                    echo "<br><img src='" . $day2_icon_url . "'><br>";
                    echo $day2_high . " / " .$day2_low;
                ?>
            </td>
            <td class="fct_cell">
                <?php
                    echo $day3_weekday_short;
                    echo "<br><img src='" . $day3_icon_url . "'><br>";
                    echo $day3_high . " / " .$day3_low;
                ?>
            </td>
        </tr>
    </table>
