<?php

namespace App\Http\Controllers;

use App\Models\AudioFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TextToSpeechController extends Controller
{
    public function generateSpeech($text)
    {
        $simpleText="hello my name is edwin";
        $response = Http::withoutVerifying()->get('https://translate.google.com/translate_tts', [
            'ie' => 'UTF-8',
            'client' => 'gtx',
            'q' => $text,
            'tl' => 'en_US'
        ]);


        $fileName = time() . '.mp3';
        Storage::disk('public')->put($fileName, $response->body());

        $audioUrl = Storage::url($fileName);

        $audioFile = new AudioFile();
        $audioFile->file_name = $fileName;
        $audioFile->file_path = $audioUrl;
        $audioFile->save();

        return $audioFile->id;

    }
}
