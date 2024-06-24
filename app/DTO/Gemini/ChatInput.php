<?php

namespace App\DTO\Gemini;

use Illuminate\Http\UploadedFile;

class ChatInput
{
    public function __construct(
        public readonly string|null $text,
        public readonly UploadedFile|null $image = null,
    ) {
    }
}
