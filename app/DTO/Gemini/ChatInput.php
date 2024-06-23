<?php

namespace App\DTO\Gemini;

class ChatInput
{
    public function __construct(
        public readonly string $text,
    ) {
    }
}
