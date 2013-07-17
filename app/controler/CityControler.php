<?php

class CityControler extends ApplicationControler{

    public function index(){

        /* for backwards comaptibility we must assume that its london */
        if($_REQUEST["Text"] && $_REQUEST["MobileNumber"]){
            $controler = new CabControler("index", array("city_name"=>"London"));
            exit();
        }

        $cities = City::get_all();
        if (FORMAT == "xml"){
            output_array_as_xml($cities, "cities");
            exit();
        }
        $view = new CityIndexView($cities); 
        $view->show();
    }

    public function show(){
        $city = City::find_by_name($this->params["city_name"]);
        if (is_null($city)){
            $view = new Error404View();
        }
        else{

            if (FORMAT == "xml"){
                $city->output_as_xml();
            }
            else{
                $view = new CityView($city);
                $view->show();
            }
        }
    }
}
?>