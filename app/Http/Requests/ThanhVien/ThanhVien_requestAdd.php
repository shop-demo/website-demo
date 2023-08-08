<?php

namespace App\Http\Requests\ThanhVien;

use Illuminate\Foundation\Http\FormRequest;

class ThanhVien_requestAdd extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;// đổi lại trước false dùng phân quyền sau này
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             
           
                'text_name'=> 'required|min:3',
                'email' => 'required|unique:users|email',
                'group_name'=> 'required|integer'

               
        ];
    
    }

    public function messages(){
        return [

            'text_name.required'=>'Dữ liệu không bỏ trống',
             'text_name.min'=> 'Dữ liệu không đúng định dạng',
             'email.required'=>'Email không được bỏ trống',
             'email.unique'=> 'Email đã tồn tại trong hệ thống',
             'email.email'=> 'Định dạng không dúng',
             'group_name.required'=>'Dữ liệu không được bỏ trống',
             'group_name.integer'=>'Dữ liệu không đúng định dạng'

        ];
    }


}
