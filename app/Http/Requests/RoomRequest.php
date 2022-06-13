<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'email' => 'required|unique:rooms,email',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên phòng',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'avatar.image' => 'Vui lòng chọn hình ảnh',
            'avatar.mimes' => 'Hình ảnh phải có định dạng jpg, png, jpeg, gif, svg',
        ];
    }
}
