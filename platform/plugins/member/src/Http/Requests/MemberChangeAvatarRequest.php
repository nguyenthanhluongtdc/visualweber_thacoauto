<?php

namespace Platform\Member\Http\Requests;

use Platform\Support\Http\Requests\Request;
use RvMedia;

class MemberChangeAvatarRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => RvMedia::imageValidationRule(),
        ];
    }
}
