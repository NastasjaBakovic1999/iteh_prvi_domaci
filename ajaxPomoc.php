<?php

include 'database.php';
      $database=new database();
      $rows=$database->vratiZanr();
      $i=1;
      if(!empty($rows)){
          foreach($rows as $row){
        $a[]=$row['Zanr']; 
        }
        }



// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $zanr) {
        if (stristr($q, substr($zanr, 0, $len))) {
            if ($hint === "") {
                $hint = $zanr;
            } else {
                $hint .= ", $zanr";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Nema predloga" : $hint;
?>