<?php

class City extends FoundationModel {

    public $id;
    public $name;
    public $country;
    public $country_code;
    public $latitude;
    public $longitude;
    public $license_plate_graphic;
    public $text_service;
    public $icon_graphic;
    public $search_class;
    
    public static function get_all(){
        return get_result_set_for_model_object(__CLASS__);
    }

    public static function find_by_name( $name ) {
        $obj = get_instance_for_model_object(__CLASS__, array("name" => $name));
        return $obj;
    }

}

?>
