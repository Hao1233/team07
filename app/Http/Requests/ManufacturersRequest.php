<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturersRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:191',
            'capital' => 'required|numeric|min:1000|max:9999',
            'found_at' => 'nullable|dateearlier:onboarddate',
            'national' => 'required|string|min:2|max:191'
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "公司名稱 為必填",
            "name.min" => "公司名稱 至少需2個字元",
            "name.max" => "公司名稱 最多需191個字元",
            "capital.required" => "公司資本額 為必填",
            "capital.min" => "公司資本額 範圍必須介於100~999之間",
            "capital.max" => "公司資本額  範圍必須介於100~999之間",
            "found_at.dateearlier" => "公司成立日期 為必填",
            "national.required" => "国家 為必填",
            "national.min" => "国家 至少需2個字元",
            "national.max" => "国家 最多需191個字元",
        ];
    }
}
