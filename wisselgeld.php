<?php

class NoAmountException extends Exception {}
class NegativeAmountException extends Exception {}
class InvalidAmountException extends Exception {}

function validateInput($input) {
    if (empty($input)) {
        throw new NoAmountException("Geen bedrag meegegeven.");
    }

    if (!is_numeric($input)) {
        throw new InvalidAmountException("Geen wisselgeld");
    }

    $amount = floatval(str_replace(',', '.', $input));

    if ($amount < 0) {
        throw new NegativeAmountException("Negatief bedrag meegegeven.");
    }

    if ($amount == 0) {
        throw new InvalidAmountException("Ongeldig bedrag meegegeven.");
    }

    return $amount;
}

if (isset($argv) && count($argv) > 1) {
    try {
        $inputAmount = validateInput($argv[1]);
    } catch (NoAmountException | NegativeAmountException | InvalidAmountException $e) {
        echo $e->getMessage() . PHP_EOL;
    } catch (TypeError $e) {
        echo "TypeError: " . $e->getMessage() . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
} else {
    echo "Geen wisselgeld" . PHP_EOL;
    exit(1);
}
?>
