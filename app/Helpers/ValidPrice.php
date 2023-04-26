<?php

namespace App\Helpers;


class ValidPrice implements Diverge
{

    //Результат отклонения в %
    private $deviationResult;
    //Допустимое отклонение в %y
    private $tolerance;
    //Новая цена
    private $new;
    //Старая цена
    private $out;

    /**
     * @param float $tolerance - допустимое отклонение
     */
    public function __construct(float $tolerance)
    {
        $this->tolerance = $tolerance;
    }

    /**
     * @param float $new новая цена, которая проверяется на отклонение
     * @param float $out текущая цена
     * @return bool
     */
    public function diffPrice(float$new, float $out): bool
    {
        // TODO: Implement diffPrice() method.
        $percent = ($new - $out)/(0.01 * $out);
        if ($percent < $this->tolerance)
        {
            $this->new = $new;
            $this->out = $out;
            return true;
        }
        return false;
    }


    /**
     * Результат отклонения в %
     *
     * @return float
     */
    public function getDeviation(): float
    {
        // TODO: Implement getDeviation() method.
       if (isset($this->new) && isset($this->out))
       {
           $this->deviationResult = ($this->new - $this->out)/(0.01 * $this->out);
           return $this-> deviationResult;
       }
       return 0;
    }
}
