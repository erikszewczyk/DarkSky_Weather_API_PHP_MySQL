# WeatherUnderground_PHP_MySQL
PHP code for pulling Weather Forecasts from the Weather Underground API and caching the data in MySQL

This code was developed to be used as an include which will display the forecast for the next 4 days.  In the code you'll need to leverage the Weather Underground forecast API which returns JSON, this then gets parsed by PHP and stored in a MySQL database so you dont have to go out to Weather Underground individually each time a page is refreshed. 

The Weather Underground API can be found here, you'll need to get your own API key:
https://www.wunderground.com/weather/api/
