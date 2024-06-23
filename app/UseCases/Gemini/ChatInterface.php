<?php

namespace App\UseCases\Gemini;

use App\DTO\Gemini\ChatInput;

interface ChatInterface
{
    public function execute(ChatInput $input): string;
}
