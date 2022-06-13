<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        return [
            'name' => 'required',
            'content' => 'required',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sự kiện',
            'content.required' => 'Vui lòng nhập nội dung',
            'avatar.image' => 'Vui lòng chọn hình ảnh',
            'avatar.mimes' => 'Hình ảnh phải có định dạng jpg, png, jpeg, gif, svg',
        ];
    }
}
