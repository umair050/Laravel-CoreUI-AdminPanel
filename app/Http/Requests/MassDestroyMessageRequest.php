<?php

namespace App\Http\Requests;

use App\Message;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMessageRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('message_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:messages,id',
        ];
    }
}