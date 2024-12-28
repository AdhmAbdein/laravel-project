<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculatorTest extends TestCase
{
    public function test_calculate_addition()
    {
        $response = $this->post('/calculate', [
            'num1' => 10,
            'num2' => 20,
            'operation' => 'add'
        ]);

        $response->assertSee('30');
    }
}

