<?php

namespace Platform\Career\Http\Requests;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CareerRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required',
            'location'    => 'required',
            'salary'      => 'required',
            'description' => 'max:400',
            'content'     => 'required',
            'status'      => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
