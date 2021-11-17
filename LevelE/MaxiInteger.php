<?php

namespace Hackathon\LevelE;

class MaxiInteger
{
    private $value;
    private $reverse;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @FIX : CAN BE UPDATED
     *
     * @param MaxiInteger $other
     * @return $this|MaxiInteger
     */
    public function add(MaxiInteger $other)
    {
        if (is_null($other)) {
            return $this;
        }

        /**
         * You can delete this part of the code
         */
        $maxLength = max(strlen($this->getValue()), strlen($other->getValue()));
        if ($maxLength) {
            $other = $other->fillWithZero($maxLength);
            $this->setValue($this->fillWithZero($maxLength)->getValue());
        }

        return $this->realSum($this, $other);
    }

    /**
     * @TODO
     *
     * @param MaxiInteger $a
     * @param MaxiInteger $b
     * @return MaxiInteger
     */
    private function realSum($a, $b)
    {
        $res = "";
        $s1 = $a->createReverseValue($a->getValue());
        $s2 = $b->createReverseValue($b->getValue());

        $ret = 0;

        $s1Len = strlen($s1);
        $s2Len = strlen($s2);
        $maxLen = $s1Len;

        if ($s1Len > $s2Len)
            $this->fillZero($s2, $s1Len);
        elseif ($s1Len < $s2Len) {
            $this->fillZero($s1, $s2Len);
            $maxLen = $s2Len;
        }
            
        for ($i=0; $i < $maxLen; ++$i) {
            $new = intval($s1[$i]) + intval($s2[$i]) + $ret;
            $ret = 0;
            if ($new > 9)
            {
                $ret = 1;
                $new = $new % 10;
            }
            $res .= strval($new);
        }

        if ($ret == 1)
            $res .= '1';

        $result = new MaxiInteger(strrev($res));
        return $result;
    }

    private function setValue($value)
    {
        $this->value = $value;
        $this->reverse = $this->createReverseValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    private function getNthOfMaxiInteger($n)
    {
        return $this->value[$n];
    }
    private function createReverseValue($value)
    {
        return strrev($value);
    }

    private function fillWithZero($totalLength)
    {
        return new self(strrev(str_pad($this->reverse, $totalLength, '0')));
    }
}
