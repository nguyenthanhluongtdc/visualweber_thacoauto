<?php

namespace Platform\Location\Http\Requests;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StateRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required',
            'country_id'   => 'required',
            'order'        => 'required|integer|min:0|max:127',
            'abbreviation' => 'max:2',
            'status'       => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
