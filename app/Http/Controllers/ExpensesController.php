<?php

namespace App\Http\Controllers;

use App\JsonResponseDecorator;
use App\Models\Expense;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    public function list(): JsonResponse
    {
        return JsonResponseDecorator::success(Expense::all());
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|int|exists:users,id',
            'reason' => 'required|min:3|max:4999',
            'value' => 'required',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            return JsonResponseDecorator::error($validator->errors());
        }

        $expense = Expense::query()->create([
            'user' => $request['user'],
            'reason' => $request['reason'],
            'value' => $request['value'],
            'date' => $request['date'],
        ]);

        return JsonResponseDecorator::success($expense);
    }
}
