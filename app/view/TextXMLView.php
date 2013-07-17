<?php
class TextXMLView {

   private $cab;

    public function __construct( $cab ) {
        $this->cab = $cab;
    }

    public function show (){
        set_xml_header();

        //here
        $text = "";

        if (empty($cars)){
            //$text = "WARNING $car_registration is not a licenced London cabbie";
            //$text = "Bad News: $car_registration does not appear to be a legit mini cab. $application_name";
            $text = "Bad News: $car_registration does not appear to be a legit minicab. Text CAB to 60835 for 2 minicabs and 1 black cab from Cabwise 35p. $application_name";

        }
        else if(count($cars)>1){
            //$text = "WARNING more than one cab found -  echo count($cars)  cabs found";
            $text = "Bad news we found more than one cab with a reg no containing $car_registration. Please check the number and try again. $application_name";
        }
        else{
            $c =  $cars[0];
            $text = "Good News: Your ride  (reg $c->reg) is a TFL licenced minicab. It's a $c->make $c->model, licence no $c->licence. $application_name";
            //$text = "REGISTERED: " . $c->reg . " is a " . $c->make . " " .  $c->model . " licence no: " . $c->licence . ". $application_name";
        }

        //number format +447900433798
        //the number expected is o2-uk.+447766666666
        //where [network name].+[ineternational code][telephone number]
        $phone_number = $_REQUEST["MobileNetwork"] . "." . $_REQUEST["MobileNumber"];
        $url = "https://dragon.operatelecom.com:1089/Gateway";

        $xml = "<?xml version=\"1.0\"?>
        <!DOCTYPE bspostevent>
          <bspostevent>
           <field name=\"Result\" type=\"string\">$text</field>
        </bspostevent>";

        header("POST HTTP/1.0");
        header("Content-type: text/xml");
        header("Content-length: " . strlen($xml) );
        header("Content-transfer-encoding: text");

        echo $xml;
    }
}
?>
