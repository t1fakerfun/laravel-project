<?php
// app/Http/Requests/StoreUpdateProductRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // ここで認可ロジックを定義することもできます trueに書き換えておきます（認可済とする）
    }

    // rules の、return に バリデーションルールを記述する
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0|max:100000',
        ];
    }
}

