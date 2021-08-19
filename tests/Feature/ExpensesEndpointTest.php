<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpensesEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExpensesList()
    {
        $response = $this->get('/api/expenses');

        $response->assertStatus(200);
    }

    public function testWithValidationError()
    {
        $response = $this->post('/api/expenses', [
            'user' => 1,
            'reason' => 'Fr',
            'value' => 2,
            'date' => '2021-08-19'
        ]);

        $response->assertStatus(500);
        $response->assertExactJson([
            'success' => false,
            'status' => 500,
            'data' => [
                'reason' => [
                    'The reason must be at least 3 characters.'
                ]
            ]
        ]);
    }
}
