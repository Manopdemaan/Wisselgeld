<?php

if (count($argv) != 2) {
    echo "Gebruik: php wisselgeld.php <bedrag>" . PHP_EOL;
    exit(1);
}

$bedrag = intval($argv[1]);

if ($bedrag < 0) {
    echo "Ongeldig bedrag bro." . PHP_EOL;
    exit(1);
}

$biljettenVan10 = floor($bedrag / 10);
$bedrag = $bedrag - ($biljettenVan10 * 10);

$biljettenVan5 = floor($bedrag / 5);
$bedrag = $bedrag - ($biljettenVan5 * 5);

$muntenVan1 = $bedrag;

if ($biljettenVan10 > 0) {
    echo "$biljettenVan10 x 10 euro" . PHP_EOL;
}

if ($biljettenVan5 > 0) {
    echo "$biljettenVan5 x 5 euro" . PHP_EOL;
}

if ($muntenVan1 > 0) {
    echo "$muntenVan1 x 1 euro" . PHP_EOL;
}

?>
