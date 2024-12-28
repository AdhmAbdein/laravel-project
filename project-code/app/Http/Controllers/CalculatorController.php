<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation; // Import the Calculation model

class CalculatorController extends Controller
{
    // Show the calculator form
    public function index()
    {
        return view('calculator');
    }

    // Perform the calculation and save the result to the database
    public function calculate(Request $request)
    {
        $result = 0;

        // Perform the calculation based on the selected operation
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

        // Save the result to the database using the Calculation model
        $calculation = new Calculation();
        $calculation->result = $result;
        $calculation->save(); // Insert the calculation result into the database

        // Return the result to the view
        return view('calculator', compact('result'));
    }
}

