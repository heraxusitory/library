<?php

namespace App\Services;

use App\Raiting;
use Illuminate\Database\Eloquent\Model;

class RaitingBooksService extends Model
{
    public function calculateRaiting() {
        $raitingTable = Raiting::getAll();
        $sum = 0;
        $countElement = 0;
        foreach ($raitingTable as $element) {
            $sum += $element->mark;
            $countElement++;
        }
         return $arifmMean = $sum/$countElement;

    }
}
