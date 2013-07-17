<?php

include(dirname(__FILE__) . '/../../lib/simplehtmldom/simple_html_dom.php');

class LondonCabSearch{
    public function search($car_registration){

        //100FXS
        $check_licence_search_url = "http://www.tfl.gov.uk/tfl/businessandpartners/taxisandprivatehire/ph/licensing/default.asp?formname=vehicle&mode=vehicles&vehicleregno=$car_registration";
        $html = file_get_html($check_licence_search_url);

        $city = City::find_by_name("London");

        $cars = array();

        $i =0;
        foreach($html->find('table') as $table)
            foreach($table->find('tr') as $tr){
                $result = array();
                foreach($tr->find('td') as $td)
                    $result[] = $td->innertext;
                if (!empty($result)){

                   $cars[] = new Cab(array(
                            "city_id"=> $city->id,
                            "vehicle_registration_number" => $result[0],
                            "make" => $result[1],
                            "model" => $result[2],
                            "license_number" => $result[3],
                            "vehicle_type" => "private hire" ));
                }
            }

        if (count($cars)==1){
            $car = array_pop($cars);
            $cabs = Cab::find_by_registration($city->id, $car->vehicle_registration_number);
            if(empty($cabs)){
               $car->save(); 
            }
            else{
                $car = array_pop($cabs);
            }
            $cars = array($car);
        }

        return $cars;
    }
}

?>
