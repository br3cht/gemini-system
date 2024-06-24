<?php

namespace App\UseCases\Gemini;

use App\DTO\Gemini\ChatInput;
use App\Entity\GeminiGpt;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Http\UploadedFile;

class ChatByProVision implements ChatInterface
{
    public function execute(ChatInput $input): string
    {
        $blob = $this->getBlob($input->image);

        $result = Gemini::geminiProVision()->generateContent([
            $input->text,
            $blob
        ]);

        return  $result->text();
    }

    public function getBlob(UploadedFile $file)
    {
        $mimeType = MimeType::from($file->getMimeType());

        return new Blob(
            $mimeType,
            base64_encode($file->getContent())
        );
    }
}
