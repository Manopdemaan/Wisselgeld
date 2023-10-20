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

$muntenVan5 = floor($bedrag / 5);
$bedrag = $bedrag - ($muntenVan5 * 5);

$muntenVan2 = floor($bedrag / 2);
$bedrag = $bedrag - ($muntenVan2 * 2);

$muntenVan1 = $bedrag;

if ($muntenVan5 > 0) {
    echo "$muntenVan5 x 5 euro" . PHP_EOL;
}

if ($muntenVan2 > 0) {
    echo "$muntenVan2 x 2 euro" . PHP_EOL;
}

if ($muntenVan1 > 0) {
    echo "$muntenVan1 x 1 euro" . PHP_EOL;
}

?>
