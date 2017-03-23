<?php
/**
 * @author Dmitriy Gusakov <flash.not@gmail.com>
 * @date 2017-03-22
 */

/**
 * Class ProgressionChecker
 */
class ProgressionChecker
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var int
     */
    private $len = 0;

    /**
     * @var null
     */
    private $d = null;

    /**
     * @var float|null
     */
    private $q = null;

    /**
     * @var array
     */
    private $sequence = array();

    /**
     * @param $sequence
     */
    public function __construct($sequence)
    {
        $this->len = count($sequence);
        $this->sequence = array_map(
            function($v){return floatval($v);},
            $sequence
        );

        $this->q = $this->sequence[1] / $this->sequence[0];
        $this->d = $this->sequence[1] - $this->sequence[0];
    }

    /**
     * Checks that the input sequence is an progression and set progression name (arithmetic or geometric)
     * @return bool
     */
    public function isProgression()
    {
        $isGeometric = null;
        $isArithmetic = null;

        for ($i = 2; $i < $this->len; $i++) {
            if (is_null($isArithmetic) || $isArithmetic) {
                $isArithmetic = $this->isArithmetic($i);
            }
            if (is_null($isGeometric) || $isGeometric) {
                $isGeometric = $this->isGeometric($i);
            }
            if ($isArithmetic === false && $isGeometric === false) {
                return false;
            }
        }

        $name = $isArithmetic ? 'arithmetic' : 'geometric';
        $this->setName($name);

        return true;
    }

    /**
     * Set progression name
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get progression name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $i
     * @return bool
     */
    private function isGeometric($i)
    {
        $mustBe = $this->sequence[0] * pow($this->q, $i);
        return $mustBe === $this->sequence[$i];
    }

    /**
     * @param $i
     * @return bool
     */
    private function isArithmetic($i)
    {
        $mustBe = $this->sequence[0] + $i * $this->d;
        return $mustBe === $this->sequence[$i];
    }
}

// get input sequence and first simple verification
if (empty($argv) || !is_array($argv)) {
    die('what?' . PHP_EOL);
}

$input = $argv;
array_shift($input);

if (empty($input) || !is_array($argv) || count($argv) < 2) {
    die('input sequence is incorrect. enter sequence values separated by a space.' . PHP_EOL);
}

// check and output
$p = new ProgressionChecker($input);

if ($p->isProgression()) {
    echo $p->getName() . ' progression';
} else {
    echo 'not a progression';
}

echo PHP_EOL;

