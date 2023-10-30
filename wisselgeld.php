<?php

function validateInput($input)
{
    if (empty($input) || !is_numeric($input)) {
        throw new Exception("Input moet een valide getal zijn");
    }

    $amount = floatval($input);

    if ($amount <= 0) {
        throw new Exception("Input moet een positief getal zijn");
    }

    return $amount;
}

const MONEY_UNITS = [5000, 10000, 2000, 1000, 500, 200, 100, 50, 20, 10, 5, 2, 1];
const CENT_UNITS = [50, 20, 10, 5, 2, 1];

function calculateChangeInMoneys($changeInCents)
{
    foreach (MONEY_UNITS as $moneyUnit) {
        if ($changeInCents >= $moneyUnit) {
            $numberOfUnits = floor($changeInCents / $moneyUnit);
            $changeInCents -= $numberOfUnits * $moneyUnit;

            if ($moneyUnit >= 100) {
                $unitName = ($moneyUnit / 100) . " euro";
            } else if ($moneyUnit == 50) {
                $unitName = "50 cent";
            } else {
                $unitName = $moneyUnit . " cent";
            }

            echo $numberOfUnits . " x " . $unitName . PHP_EOL;
        }
    }

    return $changeInCents;
}

function calculateChangeInCents($changeInCents)
{
    $changeInCents = round($changeInCents / 5) * 5;

    foreach (CENT_UNITS as $centUnit) {
        if ($changeInCents >= $centUnit) {
            $numberOfUnits = floor($changeInCents / $centUnit);
            $changeInCents -= $numberOfUnits * $centUnit;
            echo $numberOfUnits . " x " . $centUnit . " cent" . PHP_EOL;
        }
    }
}

function calculateChange($amount)
{
    $amount = round($amount * 20) / 20;
    $amountInCents = $amount * 100;
    $changeInCents = $amountInCents;

    $changeInCents = calculateChangeInMoneys($changeInCents);
    calculateChangeInCents($changeInCents);
}

try {
    if ($argc < 2) {
        throw new Exception("geen wisselgeld");
    }

    $amount = validateInput($argv[1]);

    calculateChange($amount);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit;
}
