<?php

class CabControler extends ApplicationControler{

    private function get_cabs($city, $reg){
        if (!is_null($city->search_class)){
            $search = new $city->search_class();
            //will return an array of arrays that are cab like
            $cabs = $search->search($reg);
        }
        else{
            $cabs = Cab::find_by_registration_part($city->id, $reg);
        }
        return $cabs;
    }

    private function get_city(){
        $city = City::find_by_name($this->params["city_name"]);
        if (is_null($city)){
            $view = new CityNotCovered();
            $view->show();
            exit();
        }
        return $city;
    }

    public function index(){

        $raw_reg = $_REQUEST["vehicle_registration_number"];
        $mobile_request = FALSE;
        if ($_REQUEST["MobileNumber"]){
            //this is a request from the text aggregator
            //which means that the request contains the car reg in a equest field called Text
            $mobile_request = TRUE;
            $mobile_number = $_REQUEST["MobileNumber"];
            if ($_REQUEST["Text"]){
                $raw_reg = $_REQUEST["Text"];                
            }
        }

        $city = $this->get_city();
        $reg = Cab::parse_reg($raw_reg);
        $cabs = $this->get_cabs($city, $reg);

        if (empty($cabs)){
            Log::log_a_search($city, $mobile_number, "index", FORMAT, $reg, $_REQUEST["latitude"], $_REQUEST["longitude"], "No cabsfound");
        
            if($mobile_request){
                $view = new NoCabsFoundTextXMLView();
            }
            elseif (FORMAT=="xml"){
                $view = new NoCabsFoundXMLView();
            }
            else{
                $view = new NoCabsFoundView();
            }
            $view->show();
        }
        else if(count($cabs)>1){
            Log::log_a_search($city, $mobile_number, "index", FORMAT, $reg, $_REQUEST["latitude"], $_REQUEST["longitude"], "Too many cabsfound " . count($cabs));

            if($mobile_request){
                $view = new ManyCabsFoundTextXMLView($cabs);
            }
            elseif (FORMAT=="xml"){
                $view = new ManyCabsFoundXMLView($cabs);
            }
            else{
                $view = new ManyCabsFoundView($cabs);
            }
            $view->show();
        }
        else{
            Log::log_a_search($city, $mobile_number, "index", FORMAT, $reg, $_REQUEST["latitude"], $_REQUEST["longitude"], "single cab found, redirecting");
            $cab =  array_pop($cabs);
            $cab->checked_counter++;
            $cab->save();
            if($mobile_request){
                $view = new CabTextXMLView($cab);
                $view->show();
            }
            else{
                $this->redirect_to("/city/$city->name/cabs/$cab->vehicle_registration_number?format=" . FORMAT);
            }
        }
    }

    public function show(){

        $city = $this->get_city();
        $reg = Cab::parse_reg($this->params["reg"]);
        $cabs = $this->get_cabs($city, $reg);

        if (count($cabs) == 0){
            Log::log_a_search($city, "", "show", FORMAT, $reg, $_REQUEST["latitude"], $_REQUEST["longitude"], "No cab found");
            $loc = "/city/$city->name/cabs/$reg?format=" . FORMAT;
            if(FORMAT=="xml"){
                $view = new Error404XMLView($loc);
            }
            else{
                $view = new Error404View($loc);
            }
        }
        else{
            Log::log_a_search($city, "", "show", FORMAT, $reg, $_REQUEST["latitude"], $_REQUEST["longitude"], "Single cab found");
            $cab =  array_pop($cabs);
            $cab->checked_counter++; //not sure we should be incrimenting this

            if (!$cab->save()){
                handle_error("Cannot save cab");
                exit();
            }

            if(FORMAT=="xml"){
                $view = new CabXMLView($cab);
            }
            else{
                $rating = new Rating(array("city_id"=>$cab->city_id));
                $view = new CabView($cab,$rating);
            }
        }

        $view->show();
    }

}
?>