<?php
if(isset($_GET['password'])){
	$password = $_GET['password'];
	if($password == "itcstutorialweather"){
		$weather_file = "weather.json"; 
		$weather_link = "https://api.darksky.net/forecast/e1ea28a145a04417280a1f84b84cb978/14.579942,121.114721";
		
		file_put_contents($weather_file, fopen($weather_link, 'r'));
	}
}
?>