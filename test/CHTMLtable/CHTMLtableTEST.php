<?php

namespace Kri\HTMLtable;

class CHTMLtableTest extends \PHPUnit_Framework_TestCase {


public function testgetTable() {
    $obj = new \Kri\HTMLtable\CHTMLtable();
    
    $td = [ '1' => [ 'name' => 'John']];
    $td = [ '1' => 'name'];
    
    $res = $obj->getTable($td, $th);
    
    $exp = '<table><tr><th>Name</th></tr><tr><td>John</td></tr></table>';
    
    $this->assertEquals($res, $exp, "Created table missmatch when using array as data in method getTable().");
    

}





}
