<?php

namespace Kri\HTMLtable;

/**
 * A utility class to easy creating and handling of tables and pagering
 * 
 * @package CHTMLtable
 */


class CHTMLtable {


private $maxpages;


/**
 * Generates html code for a table.
 * 
 * @param array td is table data.
 * @param array th is optional, and displays table headings.
 * @param boolean pageringStatus defaults false, change to true to enable pagering.
 * @param int maxrows sets the number of rows the table should contain.
 * 
 * @return string of html table with or without pagering.
 */
public function getTable($td = [], $th = [null], $pageringStatus = false, $maxrows = null) {
    $table = "<table>";
    
    if( isset($th)) {
        $table .= "<tr>";
        foreach($th as $val) {
            $table .= "<th>$val</th>";
        }
        $table .= "</tr>";
    }
    
    
    if($pageringStatus === true) {
        $pagering = $this->getPageNavigation($td, $maxrows);
        $chunkTd = array_chunk($td, $maxrows);
        $page = $this->getPage();
        for($i=1; $i<=$this->maxpages; $i++) {
            if($page == $i) {
                foreach(current($chunkTd) as $val) {
                $table .= $this->assignHtmlToTable($val);
                }
            }
            next($chunkTd);
        }
        $table .= "</table>";
        $table .= $pagering;
    }
    
    
    else {
        foreach($td as $val) {
            $table .= $this->assignHtmlToTable($val);
        }
        $table .= "</table>";
    }

    return $table;
}



/**
 * @param val is the value from the array to put in the table.
 * @return string table with or without pagering.
*/
private function assignHtmlToTable($val) {
    $table = "<tr>";
    if(is_array($val)) {
        foreach($val as $var) {
            $table .= "<td>$var</td>";
        }
    }
    else {
        $table .= "<td>$val</td>";
    }
    $table .= "</tr>";
    return $table;
}




/**
 * Set the value of page.
 * if no get value is set, use default value 1.
 * 
 * @return int page
 */
private function getPage() {
    if(!isset($_GET['page'])) {
        $page = 1;
    }
    else {
        $page = $_GET['page'];
    }
    return $page;
}


/**
 * Generates the pagering html links.
 * 
 * @param array td for counting the rows in the array.
 * @param int maxrows is the number of rows/indexes the table will display.
 * @param int min is the minimum number of pages.
 * @return string with html code for pagering, a link etc.
 */
private function getPageNavigation($td, $maxrows, $min=1) {
    $page = $this->getPage();
    $rows = count($td);
    $this->maxpages = $rows/$maxrows;
    if($this->maxpages > (int)$this->maxpages) {
        $this->maxpages = (int)$this->maxpages + 1;
    }
    $chunkTd = array_chunk($td, $maxrows);
    
    $nav = ($page != $min) ? "<a href='" . $this->getQueryString(array('page' => $min)) . "'>&lt;&lt;</a> " : '&lt;&lt; ';
    $nav .= ($page > $min) ? "<a href='" . $this->getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "'>&lt;</a> " : '&lt; ';

    for($i=$min; $i<=$this->maxpages; $i++) {
        if($page == $i) {
            $nav .= "$i ";
        }
        else {
            current($chunkTd);
            $nav .= "<a href='" . $this->getQueryString(array('page' => $i)) . "'>$i</a> ";
            next($chunkTd);
        }
        
    }

    $nav .= ($page < $this->maxpages) ? "<a href='" . $this->getQueryString(array('page' => ($page < $this->maxpages ? $page + 1 : $this->maxpages) )) . "'>&gt;</a> " : '&gt; ';
    $nav .= ($page != $this->maxpages) ? "<a href='" . $this->getQueryString(array('page' => $this->maxpages)) . "'>&gt;&gt;</a> " : '&gt;&gt; ';
    return $nav;
}





/**
 * Use the current querystring as base, modify it according to $options and return the modified query string.
 *
 * @param array $options to set/change.
 * @param string $prepend this to the resulting query string
 * @return string with an updated query string.
 */
private function getQueryString($options=array(), $prepend='?') {
    // parse query string into array
    $query = array();
    parse_str($_SERVER['QUERY_STRING'], $query);

    // Modify the existing query string with new options
    $query = array_merge($query, $options);

    // Return the modified querystring
    return $prepend . htmlentities(http_build_query($query));
}




}
