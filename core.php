<?php
function de($content){
	return json_decode($content);
}
function get($ip){
	$url = curls("http://www.geoplugin.net/json.gp?ip=".$ip);
	return de($url);
}
function curls($url){
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36");
	$result = curl_exec($ch);
	return $result;
	curl_close($ch);
}