<?php
// taken from the PHP Manual, by Anonymous
function sqlite_open($location,$mode) 
{ 
    $handle = new SQLite3($location); 
    return $handle; 
} 
function sqlite_query($dbhandle,$query) 
{ 
    $array['dbhandle'] = $dbhandle; 
    $array['query'] = $query; 
    $result = $dbhandle->query($query); 
    return $result; 
} 
function sqlite_fetch_array(&$result,$type) 
{ 
    #Get Columns 
    $i = 0; 
    while ($result->columnName($i)) 
    { 
        $columns[ ] = $result->columnName($i); 
        $i++; 
    } 
    
    $resx = $result->fetchArray(SQLITE3_ASSOC); 
    return $resx; 
} 
?>
