<?php

function validateInput($input) {
    return floatval(str_replace(',', '.', $input));
}

function roundToNearestFiveCents($amount) {
    return round($amount * 20) / 20;
}

function calculateChange($amount) {
    $change = [];
    define('MONEY_UNITS', [50.0, 20.0, 10.0, 5.0, 2.0, 1.0, 0.5, 0.2, 0.1, 0.05]);

    foreach (MONEY_UNITS as $unit) {
        $numberOfUnits = floor($amount / $unit);
        if ($numberOfUnits > 0) {
            if ($unit >= 1) {
                if ($unit == 1.0) {
                    $change[] = "1 x 1 euro";
                } else {
                    $change[] = "$numberOfUnits x " . intval($unit) . " euro";
                }
            } else {
                if ($unit >= 0.01) {
                    if ($unit == 0.05) {
                        $change[] = "$numberOfUnits x 5 cent";
                    } else {
                        $change[] = "$numberOfUnits x " . intval($unit * 100) . " cent";
                    }
                }
            }
            $amount = round(fmod($amount, $unit), 2);
        }
    }

    return $change;
}

if (count($argv) != 2) {
    echo "Geen wisselgeld" . PHP_EOL;
    exit(1);
}

$inputAmount = validateInput($argv[1]);
if ($inputAmount < 0) {
    echo "Ongeldig bedrag bro." . PHP_EOL;
    exit(1);
}

$roundedAmount = roundToNearestFiveCents($inputAmount);
$change = calculateChange($roundedAmount);

foreach ($change as $changeItem) {
    echo $changeItem . PHP_EOL;
}

?>
