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
    
    public function inputMultiple()
    {
        return view('extgreeting.input_multiple');
    }

    public function greetMultiple(Request $request)
    {
        $names     = $request->input('names', []);
        $types     = $request->input('types', []);
        $tensions  = $request->input('tensions', []);

        $messages = [];

        for ($i = 0; $i < count($names); $i++) {
            $name    = $names[$i] ?? 'ゲスト';
            $type    = $types[$i] ?? 'human';
            $tension = $tensions[$i] ?? 'average';

            $messages[] = $this->greetingService->getMessage($name, $type, $tension);
        }

        return view('extgreeting.greet_multiple', ['messages' => $messages]);
    }
}