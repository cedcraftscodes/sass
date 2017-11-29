<?php 
	$weather_file = "weather.json"; 
	$weather_link = "https://api.darksky.net/forecast/e1ea28a145a04417280a1f84b84cb978/14.579942,121.114721";

	if (!file_exists($weather_file)) {   
    	file_put_contents($weather_file, fopen($weather_link, 'r'));
    }
	$weather = file_get_contents($weather_file);
	$var = json_decode($weather, true);

	$currentTime = $var["currently"]["time"];
	$beginOfDay = strtotime("midnight", time());
	$endOfDay   = strtotime("tomorrow", $beginOfDay) - 1;

	if(!($currentTime >= $beginOfDay &&  $currentTime <= $endOfDay)){
		file_put_contents($weather_file, fopen($weather_link, 'r'));
	} 
	$weather_response = array();
	foreach ($var["daily"]["data"] as $daily ) {
		array_push($weather_response, $daily);
	}
	echo json_encode($weather_response);
	

?>