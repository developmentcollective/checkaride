<?php


class LogTest extends PHPUnit_Framework_TestCase {

    private $city;

    function setUp(){
        $this->city = City::find_by_name("Basingstoke");
    }
 
    public function test_logging(){
        $result = Log::log_a_search($this->city, "+447900433798", "index", FORMAT, "WK04FYL", 0.123, 54.234, "Test Log Mesage");
        $this->assertTrue($result);
    }

}
?>