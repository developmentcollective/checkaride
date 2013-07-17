<?php
require_once '../../lib/framework/common.php';

echo "";
echo "importing worthing xml file\n";

error_reporting(E_ALL ^ E_NOTICE);

//setup some stats for the import
$number_of_import_rows = 0;
$time_start = microtime(true);

//setup the import
$city = City::find_by_name("Worthing");
$import = new Import(array("city_id"=>$city->id));
$import->save();

define ("COLUMN_Id",                0);
define ("COLUMN_Issued",            1);
define ("COLUMN_Commence",          2);
define ("COLUMN_Expiry",            3);
define ("COLUMN_reason",            4);
define ("COLUMN_reg_number",        5);
define ("COLUMN_vechicle",          6);
define ("COLUMN_Proprietor",        7);
define ("COLUMN_Num_of_Passengers", 8);

// get contents of a file into a string
$filename = "../../content/worthing/worthing.xml";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

$xml = new SimpleXMLElement($contents);

$number_of_import_rows = 0;
foreach($xml->row as $row){
    $number_of_import_rows++;
    $reg = Cab::parse_reg((string)$row->cell[COLUMN_reg_number]);

    $cabs = Cab::find_by_registration($city->id, $reg);
    if (count($cabs)==0)
        $cab = new Cab();
    else
        $cab = array_pop($cabs);

    $cab->city_id = $city->id;
    $cab->import_id = $import->id;
    $cab->license_number = (string)$row->cell[COLUMN_Id];
    $cab->license_expiry = (string)$row->cell[COLUMN_Expiry];
    $cab->name_of_licensee = (string)$row->cell[COLUMN_Proprietor];
    $cab->vehicle_registration_number = $reg;
    $cab->vehicle_type = "Hackney Carriage";
    $cab->make = (string)$row->cell[COLUMN_vechicle];

    $cab->save();
    echo "$number_of_import_rows $cab->vehicle_registration_number imported to id $cab->id\n";
}

Cab::delete_below_imort_id($city->id, $import->id);

//report the amount of time it took
$time_end = microtime(true);
$time = $time_end - $time_start;

$import->number_of_rows = $number_of_import_rows;
$import->time_to_import = $time;
$import->save();

echo "[info] processed $number_of_import_rows rows in $time seconds\n";

?>