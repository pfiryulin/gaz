<?php

namespace App\Http\Requests\Salers;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequestListPeriod extends FormRequest
{
    public function rules(): array
    {
        return [
            'start' => ['required', 'integer'],
            'end' => ['required', 'integer'],
            'format'=>['string', 'in:json,csv'],
        ];
    }
}
