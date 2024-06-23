<?php

namespace App\UseCases\Gemini;

use App\DTO\Gemini\ChatInput;
use App\Entity\GeminiGpt;
use Gemini\Laravel\Facades\Gemini;

class WhatHappned implements ChatInterface
{
    protected GeminiGpt $geminiGpt;

    public function __construct(GeminiGpt $geminiGpt)
    {
        $this->geminiGpt = $geminiGpt;
    }

    public function execute(ChatInput $chatInput): string
    {
        return $this->geminiGpt->textOnlyInput($chatInput);
    }
}
