<?php

class Log extends FoundationModel {

    public $id;
    public $city_id;
    public $mobile_number;
    public $search_method;
    public $format;
    public $vehicle_registration_number;
    public $latitude;
    public $longitude;
    public $result;

    public static function get_all(){
        return get_result_set_for_model_object(__CLASS__);
    }

    public static function log_a_search ( $city, $mobile_number, $search_method, $format, $vehicle_registration_number, $latitude, $longitude, $result){
        
        $log = new Log(array(
            "city_id" => $city->id,
            "mobile_number" => $mobile_number,
            "search_method" => $search_method,
            "format" => $format,
            "vehicle_registration_number" => $vehicle_registration_number,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "result" => $result));
        return $log->save();
    }


}

?>
