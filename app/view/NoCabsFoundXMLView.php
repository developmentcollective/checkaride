<?php
class NoCabsFoundXMLView  {

    public function show ( ){
        set_xml_header();
?>
<checkmyride>
    <result>
        <title>Bad News</title>
        <description>
Your search did not find any cabs.
Be careful out there!
        </description>
    </result>
</checkmyride>
<?php
    }
}
?>
