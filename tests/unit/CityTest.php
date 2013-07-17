<?php

class CityTest extends PHPUnit_Framework_TestCase {

    public function test_create_city(){

        $city = new City(array("name"=>"chid"));
        $this->assertNotNull($city);
        $this->assertTrue($city.save());

    }

    public function test_delete_city(){

        $city = City::find_by_name("chid");
        $this->assertTrue($city.delete());

    }

}
?>