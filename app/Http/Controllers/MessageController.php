<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:128'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'min:3', 'max:128'],
            'message' => ['required', 'string', 'min:16', 'max:1024']
        ]);

        info($validated);

        return response()->noContent();
    }
}
