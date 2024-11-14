<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionsListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fromDate' => ['required', 'date', 'date_format:Y-m-d'],
            'toDate' => ['required', 'date', 'date_format:Y-m-d'],
            'status' => ['nullable', 'string'],
            'operation' => ['nullable', 'string'],
            'merchantId' => ['nullable', 'integer'],
            'acquirerId' => ['nullable', 'integer'],
            'paymentMethod' => ['nullable', 'string'],
            'errorCode' => ['nullable', 'string'],
            'filterField' => ['nullable', 'string'],
            'filterValue' => ['nullable', 'string'],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }
}
