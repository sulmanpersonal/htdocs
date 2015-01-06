<?php
    $flavors = array("Vanilla","Chocolate","Strawberry");
?>

<pre>
    <?php
        echo "We have " .count($flavors)." flavors available. Here's a list:\n";

        foreach($flavors as $flav) {
            echo $flav . "\n";
        }
    ?>
</pre>

<?php
    $countries = array();
    $countries[0] = array(
        "code" => "US",
        "name" => "United States",
        "capital" => "Washington"
    );
    $countries[1] = array(
        "code" => "DE",
        "name" => "Germany",
        "capital" => "Lahore"
    );

//    echo $countries["DE"];

    /*$country = array(
        "code" => "US",
        "name" => "united States",
        "capital" => "Washington"
    );*/
?>

<pre><?php var_dump($countries[0]["code"])?></pre>