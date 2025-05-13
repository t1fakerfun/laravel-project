<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GreetingService;

class GreetingController extends Controller
{
    protected $greetingService;

    // コンストラクタで依存注入
    public function __construct(GreetingService $greetingService)
    {
        $this->greetingService = $greetingService;
    }

    // URL: /greeting/{name}
    public function greet($name = 'Guest')
    {
        $message = $this->greetingService->getMessage($name);
        return view('greeting.greet', ['message' => $message]);
    }
}