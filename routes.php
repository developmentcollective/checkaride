<?php

$routes["rating_post"]   = new Route(array("controler"=>"rating", "action"=>"save",  "pattern"=>"/city\/:city_name\/cabs\/:reg\/ratings/", "city_name" => "[\w ]+", "reg" => "[\w ]+", "method"=>"POST"));

$routes["cab_show"]   = new Route(array("controler"=>"cab", "action"=>"show",  "pattern"=>"/city\/:city_name\/cabs\/:reg/", "city_name" => "[\w ]+", "reg" => "[\w ]+"));
$routes["cab_index"]  = new Route(array("controler"=>"cab", "action"=>"index", "pattern"=>"/city\/:city_name\/cabs/", "city_name" => "[\w ]+"));

$routes["city_index"] = new Route(array("controler"=>"city", "action"=>"index"));
$routes["city_show"]  = new Route(array("controler"=>"city", "action"=>"show", "pattern"=>"/city\/:city_name/", "city_name" => "[\w ]+"));

$routes["site_tandc"] = new Route(array("controler"=>"site", "action"=>"terms_and_conditions"));

$routes["log_index"] = new Route(array("controler"=>"log", "action"=>"index"));

$routes["user_login"] = new Route(array("controler"=>"user", "action"=>"login"));

$routes["admin_index"] = new Route(array("controler"=>"admin", "action"=>"index"));

$routes["root"] = new Route(array("controler"=>"city", "action"=>"index"));

?>
