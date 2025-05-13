<?php
namespace App\Services;
class GreetingService
{
    public function getMessage(string $name): string{
        return match(strtolower($name)){
            'cat' => 'ニャーニャー',
            'dog'=> 'ワンワン',
            'luffy'=>'海賊王に！！！俺はなる！！！',
            default => 'こんにちは、'. $name .'さん！'
        };
    }
}