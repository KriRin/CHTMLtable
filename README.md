[![Build Status](https://travis-ci.org/KriRin/CHTMLtable.svg?branch=master)](https://travis-ci.org/KriRin/CHTMLtable)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/KriRin/CHTMLtable/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/KriRin/CHTMLtable/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/KriRin/CHTMLtable/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/KriRin/CHTMLtable/?branch=master)

HTMLtable
=========

Use HTMLtable to create and show tables with or without pagination.

This module was made in the course [phpmvc](http://dbwebb.se/phpmvc).
It was made for use with [Anax-MVC](https://github.com/mosbth/Anax-MVC) but can be use in simpler ways too.




-------------
##Install in Anax
Add to your composer.json file with `require`.

    "require": {
        ...
        "kri/chtmltable": "dev-master"
    }

Run `composer install --no-dev` or `composer update --no-dev` to get kri/chtmltable.
It is also possible to test HTMLtable outside of the vendor folder. Copy the table-anax-style.php file to your webroot and point your browser there.



##Usage
First you have to create a table object in your pagecontroller.

**Anax**
In Anax you can add it with DI like this: di->set('table', '\Kri\HTMLtable\CHTMLtable');

Then its ready to be used. The function takes 4 options. 

* $td is the array with data to generate a table of.
* $th is an optional array and displays table headings.
* Next is a optional boolean value if you want to generate pagering true/false, default is false.
* If you choose to enable pagering the last value is how many rows/indexes to display per page.

Example: $app->table->getTable($td, $th, true, 3)
Full example can be found in chtmltable/webroot/page-anax-style.php.


**Outside Anax**
Another simpler way off adding it is to create the object like this: $table = new kri\HTMLTable\CHTMLTable();

Then use it the same way as in Anax: $table->getTable($td, $th, true, 3);
Full example can be found in chtmltable/webroot/page-with-table.php **and** page-with-table-pagering.php.




About
-----
###Requirements
* PHP 5.4 or above
* [Anax-MVC](https://github.com/mosbth/Anax-MVC) (for use with Anax)

###Author
KriRin

###License
**MIT**- See LICENSE.txt file.
