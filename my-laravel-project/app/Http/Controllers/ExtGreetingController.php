<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExtGreetingService;

class ExtGreetingController extends Controller
{
    protected $greetingService;

    public function __construct(ExtGreetingService $greetingService)
    {
        $this->greetingService = $greetingService;
    }
    public function input()
    {
        return view('extgreeting.input', [
            'name'     => 'ゲスト',
            'type'     => 'human',
            'tension'  => 'average',
        ]);
    }

    public function greet(Request $request)
    {
        $name     = $request->input('name', 'ゲスト');
        $type     = $request->input('type', 'human');
        $tension  = $request->input('tension', 'average');

        $message = $this->greetingService->getMessage($name, $type, $tension);

        return view('extgreeting.greet', ['message' => $message]);
    }
}