<?php
/**
 * passed in reg comes as a param called Text
 * test licence# AC08 OXA
 * http://www.tfl.gov.uk/tfl/businessandpartners/taxisandprivatehire/ph/licensing/default.asp?formname=vehicle&mode=vehicles&vehicleregno=AC08%20OXA
 *
 * output
 *   [XXX] cabs found text [text number] CHECK again with more of the car reg.
 * or
 *   [car_registration] is a licenced london taxi.
 *   make [make]
 *   model [model]
 *   licence [licence]
*/
    $check_a_ride_number = "64343";
    $application_name = "checkaride.com";
    include(dirname(__FILE__) . '/lib/simplehtmldom/simple_html_dom.php');

    class Car{
        public $reg;
        public $make;
        public $model;
        public $licence;
        function __construct($car) {
           $this->reg = $car[0];
           $this->make = $car[1];;
           $this->model = $car[2];;
           $this->licence = $car[3];;
        }
        public function get_xml(){
           return "<car><reg>$this->reg</reg><make>$this->make</make><model>$this->model</model><licence>$this->licence</licence></car>";
        }
        public function get_html(){
           return "<div id='car$this->reg' class='car'><ul><li>registration $this->reg</li><li>make $this->make</li><li>model $this->model</li><li>licence $this->licence</li></ul></div>";
        }
        public function get_txt(){
           return "reg:$this->reg, make:$this->make, model $this->model";
        }
    }
    $cars = array();

    function log_a_ride($reg, $mobile, $format, $carsfound){
        //$_REQUEST["Text"]
        //$_REQUEST["MobileNumber"]
        //$_REQUEST["format"]
        $log_msg = "[" . date("d/m/y H:i:s:") . "] checkaride.com: reg=$reg, mobile=$mobile, format=$format, found=$carsfound";
        $log_file = dirname(__FILE__) . '/logs/checkaride_' . date("d_m_y") .".log";
        $fd = fopen($log_file, "a");
        fwrite($fd, $log_msg . "\n");
        fclose($fd);
    }

    $car_registration = $_REQUEST["Text"];
    if ($car_registration){
        $car_registration = preg_replace('/\s+/', '', $car_registration);

        $check_licence_search_url = "http://www.tfl.gov.uk/tfl/businessandpartners/taxisandprivatehire/ph/licensing/default.asp?formname=vehicle&mode=vehicles&vehicleregno=$car_registration";
        $html = file_get_html($check_licence_search_url);

        $i =0;
        foreach($html->find('table') as $table)
            foreach($table->find('tr') as $tr){
                $result = array();
                foreach($tr->find('td') as $td)
                    $result[] = $td->innertext;
                if (!empty($result))
                    $cars[] = new Car($result);
            }
    }

    log_a_ride($car_registration, $_REQUEST["MobileNumber"], $_REQUEST["format"],count($cars));

    if ($_REQUEST["MobileNumber"]){
        include(dirname(__FILE__) . '/render_txt.php');
    }
    elseif ($_REQUEST["format"]=="xml"){
        include(dirname(__FILE__) . '/render_xml.php');
    }
    else{
        include(dirname(__FILE__) . '/render_html.php');
    }
?>
