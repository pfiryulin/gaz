<?php

namespace App\Http\Requests\Salers;

use Illuminate\Foundation\Http\FormRequest;

class CreateSaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sale'=>['required', 'json'],
        ];
    }
}
