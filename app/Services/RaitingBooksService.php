<?php


namespace App\Services;

class RaitingBooksService
{
    public function calculateRaiting($tableOfRaiting, $columnMark) {
        $sum = 0;
        $countElement = 1;
        foreach ($tableOfRaiting as $element) {
            $countElement = 0;
            $sum += $element->$columnMark;
            $countElement++;
        }
        return $arifmMean = $sum/$countElement;

    }
}
