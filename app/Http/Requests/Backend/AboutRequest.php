<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'POST':
            {
                return[
                    'title'     => 'nullable',
                    'text'      => 'nullable',
                    'image'     => 'nullable|max:5048'
                ];
            }

            case 'PUT':
            {
                return[
                    'title'     => 'nullable',
                    'text'      => 'nullable',
                    'image'     => 'nullable|max:5048'
                ];
            }

            case 'PATCH':
            {
                return[
                    'title'     => 'nullable',
                    'text'      => 'nullable',
                    'image'     => 'nullable|max:5048'
                ];
            }

            default: break;
        }

    }
}
