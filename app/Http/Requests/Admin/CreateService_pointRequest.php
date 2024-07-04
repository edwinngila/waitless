<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\ServicePoint;
use App\Models\Admin\Service_point;
use Illuminate\Foundation\Http\FormRequest;

class CreateService_pointRequest extends FormRequest
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
        return ServicePoint::$rules;
    }
}
