<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessRequest extends AbstractProcessRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules['identifier'] = 'required|alpha_dash|processIdentifier';
        return $rules;
    }
}
