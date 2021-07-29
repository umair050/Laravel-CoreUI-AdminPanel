<?php

namespace App\Http\Requests;

use App\Message;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('message_edit');
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