<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionsReportRequest extends FormRequest
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
            'merchant' => ['nullable', 'integer'],
            'acquirer' => ['nullable', 'integer'],
        ];
    }
}
