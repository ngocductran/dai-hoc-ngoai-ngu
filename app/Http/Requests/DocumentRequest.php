<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Vui lòng nhập tên file',
            'file.mimes' => 'Nhập file đúng định dạng',
            'file.max' => 'Dung luong file quá lớn',
        ];
    }
}
