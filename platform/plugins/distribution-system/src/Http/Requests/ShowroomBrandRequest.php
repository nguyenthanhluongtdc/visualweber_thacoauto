<?php

namespace Platform\DistributionSystem\Http\Requests;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ShowroomBrandRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'   => 'required',
            'brand_id'   => 'required',
            'showroom_id'   => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
