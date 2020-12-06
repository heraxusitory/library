<?php

namespace App\Http\Controllers;

use App\Raiting;
use App\Services\RaitingBooksService;
use Illuminate\Http\Request;

class RaitingController extends Controller
{
    public function prepareRaiting(Request $request, Raiting $raitingM, RaitingBooksService $rms, $bookId, $userId)
    {
        if (!empty($request)) {
            $raiting = $request->rating;
            if ($raiting > 5) {
                $raiting = 5;
            }
            if ($raiting < 1) {
                $raiting = 1;
            }


            Raiting::updateOrCreate([
                    'book_id' => $bookId,
                    'user_id' => $userId],
                    ['mark' => $raiting]
            );
            $nameColumnMark = 'mark';
            $raitingTable = Raiting::getAll($bookId);
            $arifmSum = $rms->calculateRaiting($raitingTable, $nameColumnMark);
            return response()->json([
                'book_id' => $bookId,
                'user_id' => $userId,
                'status' => 'ok',
                'result' => true,
                'raiting' => $raiting,
                'arifmSum' => $arifmSum
            ]);
        }
    }
}
