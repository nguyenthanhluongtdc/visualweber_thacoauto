<?php

namespace Platform\Setting\Http\Requests;

use Assets;
use Platform\Support\Http\Requests\Request;
use DateTimeZone;
use Illuminate\Validation\Rule;

class SettingRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'admin_email'         => 'nullable|email',
            'default_admin_theme' => Rule::in(array_keys(Assets::getThemes())),
            'time_zone'           => Rule::in(DateTimeZone::listIdentifiers()),
        ];
    }
}
