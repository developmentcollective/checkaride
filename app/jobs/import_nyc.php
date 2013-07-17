<?php
require_once '../../lib/php_excel_reader/php-excel-reader-2.21/excel_reader2.php';
require_once '../../lib/framework/common.php';

error_reporting(E_ALL ^ E_NOTICE);

//setup some stats for the import
$number_of_import_rows = 0;
$time_start = microtime(true);

//setup the import
$city = City::find_by_name("New York");
$import = new Import(array("city_id"=>$city->id));
$import->save();

//setup the spreadsheet to import from
$data = new Spreadsheet_Excel_Reader("../../content/nyc/current_black_car_vehicles.xls");
$rows = $data->rowcount($sheet_index=0);
$cols = $data->colcount($sheet_index=0);

//define the columns in the spread sheet
define ("COLUMN_Affiliated_Base_License_Number",    1);
define ("COLUMN_License_Number",                    2);
define ("COLUMN_Name_of_Licensee",                  3);
define ("COLUMN_License_Type",                      4);
define ("COLUMN_DMV_License_Plate",                 5);
define ("COLUMN_VIN",                               6);
define ("COLUMN_Hybrid_Accessible_CNG_OR_Stretch_Limousine_Vehicle", 7);
define ("COLUMN_Model_Year",                        8);

//delete the old data from the import table 
NYCImportCab::delete_all();

//for debug only
//$rows = 5;

//iterate through the spreadsheet creating an NYCImportCab row for each row
for ($i=2;$i<$rows;$i++){ //ignore the header row
    $number_of_import_rows++;
    $cab = new NYCImportCab( array(
            "city_id" => $city->id,
            "import_id" => $import->id,
            "affiliated_base_license_number" => $data->val($i,COLUMN_Affiliated_Base_License_Number),
            "license_number" => $data->val($i,COLUMN_License_Number),
            "name_of_licensee" => $data->val($i,COLUMN_Name_of_Licensee),
            "license_type" => $data->val($i,COLUMN_License_Type),
            "vehicle_registration_number" => $data->val($i,COLUMN_DMV_License_Plate),
            "vin" => $data->val($i,COLUMN_VIN),
            "vehicle_type" => $data->val($i,COLUMN_Hybrid_Accessible_CNG_OR_Stretch_Limousine_Vehicle),
            "year" => $data->val($i,COLUMN_Model_Year)
        ));
    $cab->save();
    echo "$number_of_import_rows $cab->vehicle_registration_number imported to id $cab->id\n";
}

$imported_cabs = NYCImportCab::get_all();
foreach ($imported_cabs as $import_cab) {
    echo "processing $import_cab->vehicle_registration_number ";
    echo $import_cab->update_cab() . "\n";
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