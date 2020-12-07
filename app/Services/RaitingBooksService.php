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
        if (!$countElement) {
            return $arifmMean = 0;
        }
        return $arifmMean = $sum/$countElement;

    }
}
