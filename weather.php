<?php

//Update these variables
$location = "[Your Location ID]"; //The location name used in your table entry
$latlong = "[37.8267,-122.4233]"; //The latitude and longitude of your location

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
    
    //Get the latest from the DB and set variables to be displayed
    $weatherdata = mysqli_query($conn, "SELECT * FROM weather WHERE location = $location ORDER BY id LIMIT 1");
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
        $day4_weekday_short = $row['day4_weekday_short'];
        $day4_icon_url = $row['day4_icon_url'];
        $day4_high = $row['day4_high'];
        $day4_low = $row['day4_low'];
        $day5_weekday_short = $row['day5_weekday_short'];
        $day5_icon_url = $row['day5_icon_url'];
        $day5_high = $row['day5_high'];
        $day5_low = $row['day5_low'];
        $day6_weekday_short = $row['day6_weekday_short'];
        $day6_icon_url = $row['day6_icon_url'];
        $day6_high = $row['day6_high'];
        $day6_low = $row['day6_low'];
        $day7_weekday_short = $row['day7_weekday_short'];
        $day7_icon_url = $row['day7_icon_url'];
        $day7_high = $row['day7_high'];
        $day7_low = $row['day7_low'];
    };

    //Close connection
    mysqli_close($conn);
?>

		<div class="forecastday">
                <?php
                    echo $day0_weekday_short;
                    $date=date_create();
                    //date_add($date,date_interval_create_from_date_string("1 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day0_icon_url . "' width=50 height=50></a><br>";
                    echo $day0_high . " / " .$day0_low;
                ?>
		</div>
		<div class="forecastday">
                <?php
                    echo $day1_weekday_short;
                    $date=date_create();
                    date_add($date,date_interval_create_from_date_string("1 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day1_icon_url . "' width=50 height=50></a><br>";
                    echo $day1_high . " / " .$day1_low;
                ?>
		</div>
		<div class="forecastday">
                <?php
                    echo $day2_weekday_short;
                    $date=date_create();
                    date_add($date,date_interval_create_from_date_string("2 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day2_icon_url . "' width=50 height=50></a><br>";
                    echo $day2_high . " / " .$day2_low;
                ?>
		</div>
		<div class="forecastday">
                <?php
                    echo $day3_weekday_short;
                    $date=date_create();
                    date_add($date,date_interval_create_from_date_string("3 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day3_icon_url . "' width=50 height=50></a><br>";
                    echo $day3_high . " / " .$day3_low;
                ?>
		</div>
        <div class="forecastday">
                <?php
                    echo $day4_weekday_short;
                    $date=date_create();
                    date_add($date,date_interval_create_from_date_string("4 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day4_icon_url . "' width=50 height=50></a><br>";
                    echo $day4_high . " / " .$day4_low;
                ?>
		</div>
        <div class="forecastday">
                <?php
                    echo $day5_weekday_short;
                    $date=date_create();
                    date_add($date,date_interval_create_from_date_string("5 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day5_icon_url . "' width=50 height=50></a><br>";
                    echo $day5_high . " / " .$day5_low;
                ?>
		</div>
        <div class="forecastday">
                <?php
                    echo $day6_weekday_short;
                    $date=date_create();
                    date_add($date,date_interval_create_from_date_string("6 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day6_icon_url . "' width=50 height=50></a><br>";
                    echo $day6_high . " / " .$day6_low;
                ?>
		</div>
        <div class="forecastday">
                <?php
                    echo $day7_weekday_short;
                    $date=date_create();
                    date_add($date,date_interval_create_from_date_string("7 days"));
                    echo "<br><a href='https://darksky.net/details/" . $latlong . "/" . date_format($date,"Y-n-j") . "/us12/en'><img src='" . $day7_icon_url . "' width=50 height=50></a><br>";
                    echo $day7_high . " / " .$day7_low;
                ?>
		</div>
?>