<?php

namespace App\Http\Controllers;

use DivisionByZeroError;
use Illuminate\Http\Request;

class CalcController extends Controller
{

    public function result($num1, $operator, $num2)
    {

        // 加算
        if ($operator == 'addition') {
            $result = $num1 + $num2;
        }
        // 減算
        elseif ($operator == 'subtraction') {
            $result = $num1 - $num2;
        }
        // 乗算
        elseif ($operator == 'multiplication') {
            $result = $num1 * $num2;
        }
        // 除算
        elseif ($operator == 'division') {
            try {
                $result = $num1 / $num2;
            } catch (DivisionByZeroError $e) {
                $result = 'num2には0以外の数値を入力してください';
            }
        }
        // その他
        else {
            $result = '正しい演算子を指定して下さい';
        }

        $data = [
            'result' => $result,
        ];

        return view('calculation.index', $data);
    }
}
