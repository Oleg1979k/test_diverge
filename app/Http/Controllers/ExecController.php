<?php

namespace App\Http\Controllers;

use App\Helpers\ValidPrice;
use App\Http\Requests\DivergRequest;

class ExecController extends Controller
{

    /**
     * @param DivergRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function run(DivergRequest $request)
    {
        $vPrice = new ValidPrice($request->tolerance);
        if($vPrice->diffPrice($request->new, $request->out))
        {
            return response()->json([
                'result' => round($vPrice->getDeviation(),1,PHP_ROUND_HALF_UP)
            ],200);
        }
        return response()->json([
           'result' => 'Конечная цена превышает допустимый уровень'
        ]);
    }
}
