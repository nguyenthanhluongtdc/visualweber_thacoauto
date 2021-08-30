<?php

namespace Platform\TestDrive\Http\Requests;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class TestDriveRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'required',
            'type_register' => 'required',
            'vocative' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'province_id' => 'required',
            'district_id' => 'required',
            'showroom_id' => 'required',
            'brand_id' => 'required',
            'time' => 'required',
            'want_to_buy_id' => 'required',
            'test_drive_id' => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
