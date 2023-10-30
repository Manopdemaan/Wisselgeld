<?php

if (count($argv) != 2) {
    echo "Geen wisselgeld" . PHP_EOL;
    exit(1);
}

$bedrag = floatval(str_replace(',', '.', $argv[1]));

if ($bedrag < 0) {
    echo "Ongeldig bedrag bro." . PHP_EOL;
    exit(1);
}

define('MONEY_UNITS', [50.0, 20.0, 10.0, 5.0, 2.0, 1.0, 0.5, 0.2, 0.1, 0.05]);

$restbedrag = $bedrag;

foreach (MONEY_UNITS as $geldeenheid) {
    if ($restbedrag >= $geldeenheid) {
        $aantalKeerGeldEenheidInRestBedrag = floor($restbedrag / $geldeenheid);
        if ($aantalKeerGeldEenheidInRestBedrag > 0) {
            if ($geldeenheid >= 1) {
                if ($geldeenheid == 1.0) {
                    echo "1 x 1 euro" . PHP_EOL;
                } else {
                    echo "$aantalKeerGeldEenheidInRestBedrag x " . intval($geldeenheid) . " euro" . PHP_EOL;
                }
            } else {
                if ($geldeenheid < 1 && $geldeenheid >= 0.01) {
                    echo "$aantalKeerGeldEenheidInRestBedrag x " . intval($geldeenheid * 100) . " cent" . PHP_EOL;
                }
            }
            $restbedrag = round(fmod($restbedrag, $geldeenheid), 2);
        }
    }
}
?>
