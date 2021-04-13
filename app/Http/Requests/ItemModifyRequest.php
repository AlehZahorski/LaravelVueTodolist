<?php

namespace App\Http\Requests;

use App\Http\Requests\RequestErrorReponser;

class ItemModifyRequest extends RequestErrorReponser
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'completed' => 'required|boolean'
        ];
    }
}
