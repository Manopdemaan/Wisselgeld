<?php

if (count($argv) != 2) {
    echo "geen wisselgeld" . PHP_EOL;
    exit(1);
}

$bedrag = intval($argv[1]);

if ($bedrag < 0) {
    echo "Ongeldig bedrag." . PHP_EOL;
    exit(1);
}

$wisselgeld = $bedrag;

if ($wisselgeld == 0) {
    echo "geen wisselgeld" . PHP_EOL;
} else {
    echo "$wisselgeld x 1 euro" . PHP_EOL;
}

?>
