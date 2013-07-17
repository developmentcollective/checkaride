<?php
class CabTextXMLView {

   private $cab;

    public function __construct( $cab ) {
        $this->cab = $cab;
    }

    public function show ( ){

        $application_name = APPLICATION_NAME;
        $c = $this->cab;
        $text = "Good News: Your ride  (reg $c->vehicle_registration_number) is a registered cab. It's a $c->make $c->model, licence no $c->license_number. $application_name";
        $phone_number = $_REQUEST["MobileNetwork"] . "." . $_REQUEST["MobileNumber"];

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