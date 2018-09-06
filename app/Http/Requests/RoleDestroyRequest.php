<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class RoleDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('role') == config('cms.default_role_id'));
    }

    public function failedAuthorization()
    {
        Session::put('page',[
            'name'  => 'roles',
            'title' => 'role'
        ]);

        abort(403);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
