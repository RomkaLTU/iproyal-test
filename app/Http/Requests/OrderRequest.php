<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'country' => [
                'required',
                'in:lt,us,de',
            ],
            'proxy_count' => [
                'required',
                'integer',
                'between:1,100',
            ],
            'title' => [
                'required',
                'string',
                'max:30',
            ],
        ];
    }

    public function data(): array
    {
        return [
            'country' => $this->input('country'),
            'proxy_count' => $this->input('proxy_count'),
            'title' => $this->input('title'),
        ];
    }
}
