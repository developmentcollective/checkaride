<?php

class Cab extends FoundationModel {

    public $id;
    public $city_id;
    public $import_id;
    public $affiliated_base_license_number;
    public $license_number;
    public $license_expiry;
    public $name_of_licensee;
    public $license_type;
    public $vehicle_registration_number;
    public $vin;
    public $vehicle_type;
    public $make;
    public $model;
    public $year;
    public $checked_counter;
    public $score;
    public $rating_count;

    public function validate (){
        $ret = true;

        //clear the validation errors
        $this->_validate_errors = array();

        //vehicle_registration_number
        $ret &= $this->validate_unique_combination(array("city_id", "vehicle_registration_number"), "must be unique");

        return $ret;
    }


    public static function parse_reg($reg){
        $reg = preg_replace('/\s+/', '', $reg);
        return $reg;
    }

    public static function delete_below_imort_id($city_id, $import_id){
        $database = new Database();
        $database->setQuery ( "delete from nycimportcab where import_id < $import_id and city_id=$city_id;" );
        if (!$database->query ()){
            handle_error('unexpected database query failure ' . $database->getErrorNum() . " error message :" . $database->getErrorMsg());
        }
    }

    public static function find_by_registration_part($city_id, $reg){
        return get_result_set_for_model_object(__CLASS__, array(
		"city_id" => $city_id,
                "vehicle_registration_number" => new QueryCriterion("like ", "'%" . $reg . "%'")));
    }

    public static function find_by_registration($city_id, $reg){
        return get_result_set_for_model_object(__CLASS__, array(
		"city_id" => $city_id,
                "vehicle_registration_number" =>  $reg));
    }

    public function get_html(){
       return "<div id='car$this->id' class='car'>
            <ul>
                <li>drivers name $this->name_of_licensee</li>
                <li>drivers licence number $this->license_number expires $this->license_expiry</li>
                <li>registration $this->vehicle_registration_number</li>
                <li>vehicle type $this->vehicle_type</li>
                <li>make $this->make</li>
                <li>model $this->model</li>
                <li>year $this->year</li>
                <li>licence $this->license_number</li>
                <li>rating " . number_format($this->score, 1) . " from " . (int)$this->rating_count . " ratings</li>
                <li>This ride has been checked " . (int)$this->checked_counter . " times</li>
            </ul></div>";
    }

}

?>