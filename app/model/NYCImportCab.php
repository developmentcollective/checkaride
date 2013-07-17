<?php

class NYCImportCab extends FoundationModel {

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

    public static function get_all(){
        return get_result_set_for_model_object(__CLASS__);
    }

    public static function delete_all(){
        $database = new Database();
        $database->setQuery ( "delete from nycimportcab;" );
        if (!$database->query ()){
            handle_error('unexpected database query failure ' . $database->getErrorNum() . " error message :" . $database->getErrorMsg());
        }
    }

    public function update_cab(){
        $ret = "[NYCImportCab]update_cab: ";
        $cabs = Cab::find_by_registration($this->city_id, $this->vehicle_registration_number);

        if (count($cabs)==0){
            $ret .= "Creating new cab ";
            $cab = new Cab();
        }
        else{
            $ret .= "Found existing cab ";
            $cab = array_pop($cabs);
        }

        $cab->import_id = $this->import_id;
        $cab->city_id = $this->city_id;
        $cab->affiliated_base_license_number = $this->affiliated_base_license_number  ;
        $cab->license_number = $this-> license_number;
        $cab->license_expiry = $this->license_expiry ;
        $cab->name_of_licensee = $this->name_of_licensee ;
        $cab->license_type = $this->license_type ;
        $cab->vehicle_registration_number = $this->vehicle_registration_number ;
        $cab->vin = $this->vin ;
        $cab->vehicle_type = $this->vehicle_type ;
        $cab->make = $this->make ;
        $cab->model = $this->model ;
        $cab->year = $this->year ;

        if(!$cab->save()){
            $ret .= "[ERROR] Saving cab ";;
        }
        return $ret;
    }
}

?>
