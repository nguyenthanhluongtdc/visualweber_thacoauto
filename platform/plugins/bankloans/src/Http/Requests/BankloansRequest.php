<?php

namespace Platform\Bankloans\Http\Requests;

use Platform\Bankloans\Models\Bankloans;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class BankloansRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $month = $this->months ?? '';
        $bank_id = $this->bank_id ?? '';
        $bankloan = $this->bankloans ?? '';
        $interest_rate = $this->interest_rate ?? '';
        return [
            'name'   => 'required',
            'description'=> 'required',
            'months' => [
                'required',
                ],
            'interest_rate'   => ['required',
                'bail',
                Rule::unique('bankloans')->where(function ($query) use ($month,$bank_id,$bankloan,$interest_rate){
                    if($bankloan){
                        return $query->where('bank_id',$bank_id)->where('months',$month)->where('interest_rate',$interest_rate)->where('id','!=',$bankloan);
                    }
                    return $query->where('bank_id', $bank_id)->where('months', $month);
                })],
            'floating_rate'   => 'required',
            'bank_id'   => 'required',
            'percent_loans'   => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
