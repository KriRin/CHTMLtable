<?php 
/**
 * move this file to your real webroot catalog inside anax.
 */



// Include the essential settings.
require __DIR__.'/config.php'; 


// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

$di->set('table', '\Kri\HTMLtable\CHTMLtable');

$app = new \Anax\Kernel\CAnax($di);





$app->router->add('', function () use ($app) {
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
    
    
    $app->views->add('default/page', [
        'title' => "Test generating a table with content",
        'content' => $app->table->getTable($td, $th, true, 5), 
    ]);
 });


// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();
