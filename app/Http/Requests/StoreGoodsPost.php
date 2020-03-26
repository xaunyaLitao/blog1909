<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodsPost extends FormRequest
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
            'goods_name'=>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:goods',
            'goods_hao'=>'required',
            'goods_cate'=>'required',
            'goods_pp'=>'required',
            'goods_price'=>'required',
            'goods_price'=>'numeric',
            'goods_number'=>'numeric',
            'goods_number'=>'required|digits_between:1,8',
        ];
    }
    public function messages(){
        'goods_name.regex'=>'商品名称可以包含中文，数字，字母，下划线长度范围为2-50位！',
        'goods_name.unique'=>'商品名称已存在！',
        'brand_name.max'=>'商品名称最大长度不超过20位！',
        'goods_hao.required'=>'商品货号必填',
        'goods_hao.unique'=>'商品货号不能重复!',
        'goods_cate.required'=>'商品分类必选!',
        'goods_pp.required'=>'商品品牌必选!',
        'goods_price.required'=>'商品价格必填!',
        'goods_number.required'=>'商品库存必填!',
        'goods_number.digits_between'=>'库存输入必须1-8位！',
        'goods_price.numeric'=>'商品价格必须是数字',
        'goods_number.numeric'=>'商品库存必须是数字',
    }
}
