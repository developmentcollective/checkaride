<?php


class FyldeCabSearchTest extends PHPUnit_Framework_TestCase {


    public function test_search(){

        $fs = new FyldeCabSearch();

        $res = $fs->search("abc");
        
        $this->assertTrue(true);
    }

}
?>