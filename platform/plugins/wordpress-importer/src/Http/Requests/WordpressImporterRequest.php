<?php

namespace Platform\WordpressImporter\Http\Requests;

use Platform\Support\Http\Requests\Request;

class WordpressImporterRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'wpexport' => 'required',
        ];
    }
}
