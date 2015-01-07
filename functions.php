<?php
function mimic_count($array) {
    $count = 0;
    foreach($array as $element) {
        $count = $count+1;
    }
    return $count;
}

$flavors = array(1,2,3,4,5,6);
echo mimic_count($flavors);

?>
<?php

$x = 1;

function sum_two_numbers($x,$y) {

    $z = $x + $y;

    return $z;

}

$y = sum_two_numbers(2,3);

echo $x;

?>