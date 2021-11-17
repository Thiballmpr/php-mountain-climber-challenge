<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        if ($this->total < $price)
            return false;
        
        $tmp = $price;
        $i = 0;
        while ($tmp > 0)
        {
            if (is_numeric($this->wallet[$i]))
            {
                $tmp -= $this->wallet[$i];
                $this->wallet[$i] = 0;
            }
            ++$i;
        }

        return true;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
