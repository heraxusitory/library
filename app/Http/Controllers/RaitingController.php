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
                    ['appreciated' => true, 'mark' => $raiting]
            );
            $nameColumnMark = 'mark';
            $raitingTable = Raiting::getAll($bookId);
            $prepareMiddleSum = $rms->calculateRaiting($raitingTable, $nameColumnMark);
            $middleSum = round($prepareMiddleSum, 1, PHP_ROUND_HALF_UP);
            $html = view('layouts.components.raitings.show_raiting', compact('middleSum','raiting', 'bookId'))->render();
            return response()->json([
                'html' => $html,
                'book_id' => $bookId,
                'user_id' => $userId,
                'status' => 'ok',
                'result' => true,
                'raiting' => $raiting,
                'middleSum' => $middleSum
            ]);
        }
    }

    public function changeRaiting(Raiting $raitingM, $bookId, $middleSum, $userId) {
        $html = view('layouts.components.raitings.estimate_raiting', compact('bookId', 'middleSum', 'userId'))->render();
        return response()->json(['html' => $html]);
    }
}
