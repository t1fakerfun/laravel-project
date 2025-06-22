<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // 当クラスには何もメソッドを書いてないがこれでよい。
    // Playlerクラスのクラス名にて、players テーブルのフィールドが自動で割り当てられる。
    // ルールとして、カラム id が存在することは必要。
    // created_at と updated_at はデフォルトで管理される。
}
