<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TextToSpeechController extends Controller
{
    public function generateSpeech(Request $request)
    {
        $textRE = $request->input('text');
        $text = rawurldecode($textRE);
        $response = Http::get('https://translate.google.com/translate_tts', [
            'ie' => 'UTF-8',
            'client' => 'gtx',
            'q' => $text,
            'tl' => 'en_US'
        ]);

        $fileName = time() . '.mp3';
        Storage::disk('public')->put($fileName, $response->body());

        $audioUrl = Storage::url($fileName);
        return response()->json(['audioUrl' => $audioUrl]);

        // return response()->download(storage_path('app/' . $fileName));

    }
}
