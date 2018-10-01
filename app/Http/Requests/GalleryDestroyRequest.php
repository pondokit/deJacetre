<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class GalleryDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return !($this->route('category') == config('cms.default_category_id'));
    }

    public function failedAuthorization()
    {
        Session::put('page',[
            'name'  => 'gallery'
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
