<?php
/**
 * @author Dmitriy Gusakov <flash.not@gmail.com>
 * @date 2017-03-22
 */

/**
 * Checks that the input sequence is an arithmetic progression
 * @param $sequence
 * @return bool
 */
function isArithmeticProgression($sequence)
{
    $d = $sequence[1] - $sequence[0];
    $len = count($sequence);

    for ($i = 2; $i < $len; $i++) {
        if ($sequence[$i] - $sequence[$i-1] !== $d) {
            return false;
        }
    }

    return true;
}

/**
 * Checks that the input sequence is an arithmetic progression
 * @param $sequence
 * @return bool
 */
function isGeometricProgression($sequence)
{
    if ($sequence[0] === 0) {
        return false;
    }
    
    $q = $sequence[1] / $sequence[0];
    $len = count($sequence);

    for ($i = 2; $i < $len; $i++) {
        $mustBe = $sequence[0] * pow($q, $i);
        if ($mustBe !== $sequence[$i]) {
            return false;
        }
    }

    return true;
}

// get input sequence and first simple verification
if (empty($argv) || !is_array($argv)) {
    die('what?' . PHP_EOL);
}

$input = $argv;
array_shift($input);

if (empty($input) || !is_array($argv) || count($argv) < 3) {
    die('input sequence is incorrect. enter sequence values separated by a space. minimal length - 3 values' . PHP_EOL);
}

$input = array_map(
    function($v){return floatval($v);},
    $input
);

// check and output
if (isArithmeticProgression($input)) {
    echo 'arithmetic progression';
} elseif (isGeometricProgression($input)) {
    echo 'geometric progression';
} else {
    echo 'not a progression';
}

echo PHP_EOL;

