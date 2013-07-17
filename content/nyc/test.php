<?php
require_once '../lib/framework/common.php';
$d = new Database();

?>
<html>
<head>
</head>

<body>
    test <br/>
<?php

$cab = new Cab( array(
        "city_id" => 1,
        "affiliated_base_license_number" => "1",
        "license_number" => "1",
        "license_expiry" => "1",
        "name_of_licensee" => "1",
        "license_type" => "1",
        "vehicle_registration_number" => "1",
        "vin" => "1",
        "vehicle_type" => "1",
        "make" => "1",
        "model" => "1",
        "year" => "1"
    ) );
$cab->save();


$cities = City::get_all();
foreach ($cities as $city){
    echo $city->id ."<br/>";
    echo $city->name ."<br/>";
}

?>
</body>
</html>
