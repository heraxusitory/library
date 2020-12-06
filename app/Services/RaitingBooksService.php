<?php


namespace App\Services;

class RaitingBooksService
{
    public function calculateRaiting($tableOfRaiting, $columnMark) {
        $sum = 0;
        $countElement = 0;
        foreach ($tableOfRaiting as $element) {
            $sum += $element->$columnMark;
            $countElement++;
        }
        return $arifmMean = $sum/$countElement;

    }
}
