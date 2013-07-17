<?php
class NoCabsFoundTextXMLView  {

    public function show ( ){

        $application_name = APPLICATION_NAME;
        $text = "Bad News: We did not find any Cabs. $application_name";
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