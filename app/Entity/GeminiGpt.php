<?php

namespace App\Entity;

use App\DTO\Gemini\ChatInput;
use Gemini\Laravel\Facades\Gemini as FacadesGemini;

class GeminiGpt
{
    public function textOnlyInput(ChatInput $input): string
    {
        return 'a';

        $response = FacadesGemini::geminiPro()->generateContent($input->text);

        return $response->text();
    }
}
