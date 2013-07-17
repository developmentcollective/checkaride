<?php
class ManyCabsFoundXMLView {

    private $cabs;

    public function __construct( $cabs ) {
        $this->cabs = $cabs;
    }

    public function show ( ){
        set_xml_header();
?>
<checkmyride>
    <result>
        <title>Bad News</title>
        <description>
We found <?php echo count($this->cabs) ?> cabs with this text in the licence plate.
Enter more characters from the licence plate and try again.
        </description>
    </result>
</checkmyride>
<?php
    }
}
?>