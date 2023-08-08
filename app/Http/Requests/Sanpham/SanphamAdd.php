<?php

namespace App\Http\Requests\Sanpham;


use Illuminate\Foundation\Http\FormRequest;

class SanphamAdd extends FormRequest
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
            //
            'name'=> 'required',
                    
            'gia'=> 'required|numeric|min:0|not_in:0', //giá không<0
                    
            'gia_khuyen_mai'=> 'required|numeric|min:0|lt:gia', //giá km<gia_ban
                    
            'hinh_minh_hoa'=>'required',
                    
            'mo_ta_ngan_gon'=>'required',
                    
            'mo_ta_chi_tiet'=>'required',
                   
            'the_loai_id'   =>'required',
                    
            'status'        =>'required'
       
        ];
   
    }


    public function messages()
    {
        return [
            //
            'name.required'=>'Nhập tên sản phẩm',
                    
            'hinh_minh_hoa.required'=>'Chọn hình ảnh sản phẩm',
           
            'gia.required'=>'Giá sản phẩm chưa nhập',
                     
            'gia.not_in'=>'Giá sản phẩm phải là số lớn hơn 0',
                    
            'gia_khuyen_mai.required'=> 'Chưa nhập giá khuyến mại sản phẩm',
                    
            'gia_khuyen_mai.lt'=>'Giá khuyến mại phải nhỏ giá bán',
                    
            'mo_ta_ngan_gon.required'=>'Mô tả sản phẩm',
                     
            'mo_ta_chi_tiet.required'=>'Chi tiết sản phẩm',
                     
            'the_loai_id.required'=>'Chọn thể loại sản phẩm',
                    
            'status.required'=>'Dữ liệu không được bỏ trống'
       
        ];
   
    }

    










}
