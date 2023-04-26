<?php

namespace App\Helpers;
interface  Diverge
{
    /**
     * Отклонение цены не должно быть больше допустимого значения (%)
     *
     * @param float $new новая цена, которая проверяется на отклонение
     * @param float $out текущая цена
     * @return bool
     */
    public function diffPrice(float $new, float $out): bool;

    /**
     * Результат отклонения в %
     *
     * @return float
     */
    public function getDeviation(): float;
}
