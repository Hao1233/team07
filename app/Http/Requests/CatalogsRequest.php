<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class CatalogsRequest extends FormRequest
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
            'mid' => 'required',
            'price' => 'required|numeric|min:100|max:999',
            'evaluaation' => 'required|numeric|min:10|max:100',
            'issue_date' => 'required|string|max:191|min:1',
            'revenue' => 'required|numeric|min:100|max:599',
            'game_type' => 'required|string|min:2|max:191'
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "game of name 為必填",
            "name.min" => "game of name 至少需2個字元",
            "name.max" => "game of name 最多需191個字元",
            "price.required" => "game of price 為必填",
            "price.min" => "game of price 範圍必須介於100~999之間",
            "price.max" => "game of price  範圍必須介於100~999之間",
            "evaluaation.required" => "game of evaluaation 為必填",
            "evaluaation.min" => "game of evaluaation  範圍必須介於10~100之間",
            "evaluaation.max" => "game of evaluaation  範圍必須介於10~100之間",
            "issue_date.dateearlier" => "game of issue date 必須大於 到職年月日",
            "revenue.required" => "game of revenue 為必填",
            "revenue.min" => "game of revenue 範圍必須介於100~599之間",
            "revenue.max" => "game of revenue 範圍必須介於100~599之間",
            "game_type.required" => "game of type 為必填",
            "game_type.min" => "game of game_type 至少需2個字元",
            "game_type.max" => "game of game_type 最多需191個字元",
        ];
    }
}
