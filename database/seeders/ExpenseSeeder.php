<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ExpenseSeeder extends Seeder
{
    protected array $expenses = [
        [
            'user' => 1,
            'reason' => 'Buy a laptop',
            'value' => 200000,
        ],
        [
            'user' => 1,
            'reason' => 'Buy a House',
            'value' => 5000000,
        ],
        [
            'user' => 1,
            'reason' => 'Buy a car',
            'value' => 1000000,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->expenses as $expense){
            $expense['date'] = Carbon::today();
            Expense::query()->create($expense);
        }
    }
}
