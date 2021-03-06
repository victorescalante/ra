<?php

namespace App\Http\Requests\Todo;

use App\Http\Requests\ApiRequest;
use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function foo\func;

class TodoRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'description'   => 'required',
            'type'          => ['required', Rule::in(['remote', 'face-to-face'])] ,
            'activity'      => ['required', Rule::in([
                'presentation-project',
                'presentation-system',
                'develop-project',
                'installation-of-system',
                'calibration-of-equipment',
                'start-system-ccs',
                'delivery-system',
                'other'
            ])],
            'date'          => 'required|date',
            'kms'           => 'required',
            'client_id'     => [new ValidRole('cliente')],
            'status'        => ['required', Rule::in([
                'open',
                'finished',
                'canceled',
                'in-progress'
            ])]
        ];
    }
}
