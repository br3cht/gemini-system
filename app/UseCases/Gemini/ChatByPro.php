<?php

namespace App\UseCases\Gemini;

use App\DTO\Gemini\ChatInput;
use Gemini\Laravel\Facades\Gemini;

class ChatByPro implements ChatInterface
{
    public function execute(ChatInput $input): string
    {
        $result = Gemini::geminiPro()->generateContent($input->text);

        return $result->text();
    }
}
