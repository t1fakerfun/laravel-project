<?php

namespace App\Services;

class ExtGreetingService
{
    public function getMessage(string $name, string $type, string $tension): string
    {
        $greeting = $this->getGreetingByTypeAndTension($type, $tension);
        return $name . ' ' . $greeting;
    }

    protected function getGreetingByTypeAndTension(string $type, string $tension): string
    {
        // マトリクスで種族とテンションに応じた挨拶を定義する
        $greetings = [
            'cat' => [
                'down' => 'にゃ・・・、みゅーみゅー',
                'average' => 'にゃん、ゴロゴロ',
                'up' => 'にゃ！、ニャーニャー！',
            ],
            'dog' => [
                'down' => 'ワン・・・、クーンクーン',
                'average' => 'ワン、ワオーン',
                'up' => 'ワン！、ワンワンワン！',
            ],
            'pirate' => [
                'down' => 'アホイ...元気ないですね。ゴムゴムの風船！',
                'average' => 'アホイ！海賊王に俺はなる！',
                'up' => 'アホイ! みんな、宴だ！シャンディアの花火だぜ！',
            ],
            'human' => [
                'down' => 'さん、どうも・・・。',
                'average' => 'さん、こんにちは。',
                'up' => 'さん！、絶好調ですね！',
            ],
        ];
        // デフォルトの挨拶を設定
        $defaultGreeting = 'さん、こんにちは。';

        // 種族とテンションに応じた挨拶を取得し、存在しない場合はデフォルトを返します
        return $greetings[strtolower($type)][strtolower($tension)] ?? $defaultGreeting;
    }
}