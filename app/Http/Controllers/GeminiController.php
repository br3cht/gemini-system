<?php

namespace App\Http\Controllers;

use App\DTO\Gemini\ChatInput;
use App\Entity\GeminiGpt;
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

    public function getInformation(ChatRequest $request)
    {
        $dataRequest = $request->validated();

        if(!empty(optional($dataRequest)['image'])){
            $service = $this->geminiUseCasesFactory->proVision();
        }else {
            $service = $this->geminiUseCasesFactory->pro();
        }

        $input = new ChatInput(
            optional($dataRequest)['text'],
            optional($dataRequest)['image']
        );

        $response = $service->execute($input);

        return response()->json(['result' => $response], 200);
    }
}
