<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function show($id)
    {
        $player = Player::find($id); // findで player のインスタンスを取得できる。
        return view('player.show', compact('player'));
        // いままで、$dataなど、配列を渡していたところに、新しくcompact というメソッドが出てきた点に着目
    }
}