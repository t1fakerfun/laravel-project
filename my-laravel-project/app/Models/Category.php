<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * カテゴリーに属する製品を取得
     * （今回の出力には使用していない）
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}