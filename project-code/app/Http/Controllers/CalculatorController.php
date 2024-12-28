<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $result = 0;
        switch ($request->operation) {
            case 'add':
                $result = $request->num1 + $request->num2;
                break;
            case 'subtract':
                $result = $request->num1 - $request->num2;
                break;
            case 'multiply':
                $result = $request->num1 * $request->num2;
                break;
            case 'divide':
                $result = $request->num2 != 0 ? $request->num1 / $request->num2 : 'Error';
                break;
        }

        return view('calculator', compact('result'));
    }
}

