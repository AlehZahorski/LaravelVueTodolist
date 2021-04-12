<?php

namespace App\Http\Requests;

use App\Http\Requests\RequestErrorReponser;

class ItemRequest extends RequestErrorReponser
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'createCategory' => 'required|boolean',
            'categoryId' => 'required_if:createCategory,=,false',
            'name' => 'required|db_string',
            'language' => 'required|db_string'
        ];
    }
}
