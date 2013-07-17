<?php
class ManyCabsFoundTextXMLView {

    private $cabs;

    public function __construct( $cabs ) {
        $this->cabs = $cabs;
    }

    public function show ( ){

        $application_name = APPLICATION_NAME;
        $text = "Bad news we found more than one cab. Please check the number and try again. $application_name";
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