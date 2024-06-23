<?php

namespace App\Factory\Gemini;

use App\Entity\GeminiGpt;
use App\UseCases\Gemini\ChatInterface;
use App\UseCases\Gemini\WhatHappned;

class GeminiUseCasesFactory
{
    public function whatHappened(): ChatInterface
    {
        return resolve(WhatHappned::class);
    }
}
