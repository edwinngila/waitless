<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TextToSpeechController extends Controller
{
    public function generateSpeech($text)
    {
        $text = rawurldecode($text);
        $response = Http::withoutVerifying()->get('https://translate.google.com/translate_tts', [
            'ie' => 'UTF-8',
            'client' => 'gtx',
            'q' => $text,
            'tl' => 'en_KE'
        ]);

        $fileName = time() . '.mp3';
        Storage::disk('public')->put($fileName, $response->body());

        $audioUrl = Storage::url($fileName);
        return response()->json(['audioUrl' => $audioUrl]);

        return response()->download(storage_path('app/' . $fileName));

    }
}
