<?php

namespace Kri\HTMLtable;


class CHTMLtableTest extends \PHPUnit_Framework_TestCase {



public function testgetTable() {
    $table = new \Kri\HTMLtable\CHTMLtable();
    
    $td = [ '1' => [ 'name' => 'John']];
    $th = [ '1' => 'name'];
    
    $res = $table->getTable($td, $th);
    
    $exp = '<table><tr><th>name</th></tr><tr><td>John</td></tr></table>';
    
    $this->assertEquals($res, $exp, "Created table missmatch when inserting td and th value in method getTable().");
    
}



/**
public function testgetTablePagering() {
    $obj = new \Kri\HTMLtable\CHTMLtable();
    
    $td = ['ex1' => [
                        'name' => 'Adam',
                        'age' => '18',
                        'occupation' => 'studying',
                        'adress' => 'abcroad 123',
                        ],
                'ex2' => [
                        'name' => 'Bob',
                        'age' => '22',
                        'occupation' => 'webb dev',
                        'adress' => 'abcroad 321',
                        ],
                'ex3' => [
                        'name' => 'test1',
                        'age' => 'test2',
                        ],
                'ex4',
                'ex5',
                'ex6',
                'ex7' => [
                        'name' => 'John',
                        'age' => '??',
                        'occupation' => 'admin',
                        'adress' => 'Doestreet 1',
                        ],
                'ex4',
                'ex5',
                'ex6',
                'ex7',
                ];
    $th = [ 0 => "Name", "Age", "Occupation", "Adress"];
    $data = $obj->getTable($td, $th, true, 3);
    $exp = "<table><tr><th>Name</th><th>Age</th><th>Occupation</th><th>Adress</th></tr><tr><td>Adam</td><td>18</td><td>studying</td><td>abcroad 123</td></tr><tr><td>Bob</td><td>22</td><td>webb dev</td><td>abcroad 321</td></tr><tr><td>test1</td><td>test2</td></tr></table>&lt;&lt; &lt; 1 <a href='?page=2'>2</a> <a href='?page=3'>3</a> <a href='?page=4'>4</a> <a href='?page=2'>&gt;</a> <a href='?page=4'>&gt;&gt;</a>";

    $this->assertEquals($data, $exp, "Created table missmatch when enabling pagering in method getTable().");
}
**/



}
