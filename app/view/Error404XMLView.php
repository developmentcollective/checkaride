<?php
class Error404XMLView {

    private $location;

    public function __construct( $loc ) {
        $this->location = $loc;
    }

    public function show (){
        header("HTTP/1.0 404 Not Found");
        set_xml_header();
?>
<error>
    <code>404</code>
    <location><?php echo $this->location ?></location>
    <description>Page Not Found</description>
</error>
<?php
    }

}
?>