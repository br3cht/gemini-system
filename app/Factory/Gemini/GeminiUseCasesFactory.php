<?php

namespace App\Factory\Gemini;

use App\Entity\GeminiGpt;
use App\UseCases\Gemini\ChatByPro;
use App\UseCases\Gemini\ChatByProVision;
use App\UseCases\Gemini\ChatInterface;
use App\UseCases\Gemini\WhatYouNeed;

class GeminiUseCasesFactory
{
    public function proVision(): ChatInterface
    {
        return resolve(ChatByProVision::class);
    }

    public function pro()
    {
        return resolve(ChatByPro::class);
    }

}
