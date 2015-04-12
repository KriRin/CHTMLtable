<?php


include_once('../autoloader.php');

$table = new \Kri\HTMLtable\CHTMLtable();

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
$data = $table->getTable($td, $th);

?>


<!doctype html>
<html>
<head>
    <meta charset=utf8>
    <title>CTable Example: How to create HTML table with CTable.</title>
    <style>
        table.table-css-class{
            font-size:26px;
        }
        th, td{
            border:1px solid #999999;
            padding:5px;
            text-align:left;
        }
    </style>
</head>
<body>

<h1>Test for htmltables without pagering</h1>

<?=$data?>

</body>
</html> 
