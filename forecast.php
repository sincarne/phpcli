#!/usr/bin/php
<?php
  define('API_KEY',   ''); // get a key at http://developer.forecast.io
  define('LATITUDE',  43.652845);
  define('LONGITUDE', -79.383742);
  define('URL',       'https://api.forecast.io/forecast/');
  define('UNITS',     'units=ca');
  
  $json = file_get_contents(URL . API_KEY . '/' . LATITUDE . ',' . LONGITUDE . '?' . UNITS);
  $response = json_decode($json);
  $temperature = 'It feels like ' . round($response->currently->apparentTemperature) . "C.";
  $conditions = $response->minutely->summary;
  $precipitation = $response->currently->precipProbability . '% chance of precipitation.';
  
  $output = $temperature . ' ' . $conditions . ' ' . $precipitation;
  
  $stdout = fopen("php://stdout", "w");
  fwrite( $stdout, $output);
  fclose( $stdout );
?>
