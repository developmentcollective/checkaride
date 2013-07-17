<?php
class CabXMLView {

   private $cab;

    public function __construct( $cab ) {
        $this->cab = $cab;
    }

    public function show (){
        set_xml_header();
?>
<checkmyride>
    <result>
        <title>Good News</title>
        <description>
Your ride (reg <?php echo html_entity_decode($this->cab->vehicle_registration_number); ?>) is a registered cab.
<?php
    $make=html_entity_decode($this->cab->make);
    if (strlen($make))
    {
?>
It is a <?php echo html_entity_decode($this->cab->make); ?> <?php echo html_entity_decode($this->cab->model); ?>.
Check the make and model before taking the cab.
<?php
    }
?>
        </description>
    </result>
<?php
    echo $this->cab->toXML();
?>
</checkmyride>
<?php
    }
}
?>
