<?php

namespace App\Http\Requests;

use App\Http\Requests\RequestErrorReponser;

class ItemCreateRequest extends RequestErrorReponser
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2'
        ];
    }
}
