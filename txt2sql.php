<?php 
// --------------------------------------------------------------

function csv_in_array($url,$delm="\t",$encl="\"",$head=false) { 
    
    $csvxrow = file($url);   // ---- csv rows to array ----
    
    $csvxrow[0] = chop($csvxrow[0]); 
    $csvxrow[0] = str_replace($encl,'',$csvxrow[0]); 
    $keydata = explode($delm,$csvxrow[0]); 
    $keynumb = count($keydata); 
    
    if ($head === true) { 
    $anzdata = count($csvxrow); 
    $z=0; 
    for($x=1; $x<$anzdata; $x++) { 
        $csvxrow[$x] = chop($csvxrow[$x]); 
        $csvxrow[$x] = str_replace($encl,'',$csvxrow[$x]); 
        $csv_data[$x] = explode($delm,$csvxrow[$x]); 
        $i=0; 
        foreach($keydata as $key) { 
            $out[$z][$key] = $csv_data[$x][$i]; 
            $i++;
            }    
        $z++;
        }
    }
    else { 
        $i=0;
        foreach($csvxrow as $item) { 
            $item = chop($item); 
            $item = str_replace($encl,'',$item); 
            $csv_data = explode($delm,$item); 
            for ($y=0; $y<$keynumb; $y++) { 
               $out[$i][$y] = $csv_data[$y]; 
            }
        $i++;
        }
    }

return $out; 
}

// --------------------------------------------------------------

?>

fuction call with 4 parameters: 

(1) = the file with CSV data (url / string)
(2) = colum delimiter (e.g: ; or | or , ...)
(3) = values enclosed by (e.g: ' or " or ^ or ...)
(4) = with or without 1st row = head (true/false) 

<?php

// ----- call ------ 
$csvdata = csv_in_array( $yourcsvfile, ";", "\"", true ); 
// ----------------- 

// ----- view ------ 
echo "<pre>\r\n"; 
print_r($csvdata);
echo "</pre>\r\n"; 
// -----------------

?>
