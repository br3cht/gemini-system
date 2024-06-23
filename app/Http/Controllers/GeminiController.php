<?php

namespace App\Http\Controllers;

use App\DTO\Gemini\ChatInput;
use App\Factory\Gemini\GeminiUseCasesFactory;
use App\Http\Requests\Gemini\ChatRequest;
use Illuminate\Http\Request;

class GeminiController extends Controller
{
    protected GeminiUseCasesFactory $geminiUseCasesFactory;

    public function __construct(GeminiUseCasesFactory $geminiUseCasesFactory)
    {
        $this->geminiUseCasesFactory = $geminiUseCasesFactory;
    }

    public function whatHappned(ChatRequest $chatRequest)
    {
        $dataRequest = $chatRequest->validated();
        $service = $this->geminiUseCasesFactory->whatHappened();
        $input = new ChatInput($dataRequest['text']);
        $result = $service->execute($input);

        return response()->json(['result' => $result], 200);
    }
}
