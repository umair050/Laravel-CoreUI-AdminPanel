<?php

namespace App\Http\Requests;

use App\Message;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('message_create');
    }

    public function rules()
    {
        return [
            'message' => [
                'required',
            ],
        ];
    }
}
