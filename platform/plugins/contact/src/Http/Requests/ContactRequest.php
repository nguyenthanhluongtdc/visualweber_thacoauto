<?php

namespace Platform\Contact\Http\Requests;

use Platform\Support\Http\Requests\Request;

class ContactRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function rules()
    {
        if (setting('enable_captcha') && is_plugin_active('captcha')) {
            return [
                'firstname'           => 'required',
                'lastname'           => 'required',
                'content'              => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ];
        }
        return [
            'firstname'           => 'required',
            'lastname'           => 'required',
            'content' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required'    => trans('Họ là bắt buộc'),
            'lastname.required'    => trans('Tên là bắt buộc'),
            'content.required' => trans('plugins/contact::contact.form.content.required'),
        ];
    }
}
