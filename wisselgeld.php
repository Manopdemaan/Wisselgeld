<?php

if (count($argv) != 2) {
    echo "geen wissegeld" . PHP_EOL;
    exit(1);
}


$bedrag = intval($argv[1]);

if ($bedrag < 0) {
    echo "Ongeldig bedrag bro." . PHP_EOL;
    exit(1);
}

define('MONEY_UNITS', [50, 20, 10, 5, 2, 1]);

$restbedrag = $bedrag;

foreach (MONEY_UNITS as $geldeenheid) {
    if ($restbedrag >= $geldeenheid) {
        $aantalKeerGeldEenheidInRestBedrag = floor($restbedrag / $geldeenheid);
        $restbedrag = $restbedrag % $geldeenheid;
        echo "$aantalKeerGeldEenheidInRestBedrag x $geldeenheid euro" . PHP_EOL;
    }
}
?>
