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
            'status' => ['nullable', 'string', 'in:APPROVED,WAITING,DECLINED,ERROR'],
            'operation' => ['nullable', 'string', 'in:DIRECT,REFUND,3D,3DAUTH,STORED'],
            'merchantId' => ['nullable', 'integer'],
            'acquirerId' => ['nullable', 'integer'],
            'paymentMethod' => ['nullable', 'string', 'in:CREDITCARD,CUP,IDEAL,GIROPAY,MISTERCASH,STORED,PAYTOCARD,CEPBANK,CITADEL'],
            'errorCode' => ['nullable', 'string', 'in:Do not honor,Invalid transaction,Invalid card,Not sufficient funds,Incorrect PIN,Invalid country association,Currency not allowed','3-D Secure Transport Error,Transaction not permitted to cardholder'],
            'filterField' => ['nullable', 'string', 'in:Transaction UUID,Customer Email,Reference No', 'Custom Data', 'Card PAN'],
            'filterValue' => ['nullable', 'string'],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }
}
