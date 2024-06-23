<?php

namespace Tests\Feature\Gemini;

use App\DTO\Gemini\ChatInput;
use App\Entity\GeminiGpt;
use App\Factory\Gemini\GeminiUseCasesFactory;
use App\UseCases\Gemini\ChatInterface;
use App\UseCases\Gemini\WhatHappned;
use Gemini\Contracts\Resources\GenerativeModelContract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class WhatHappenedTest extends TestCase
{
    public function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }

    public function test_gemini_what_happened_use_case(): void
    {
        $this->mock(GeminiGpt::class, function (MockInterface $mock) {
            $mock->shouldReceive('textOnlyInput')
                ->once()
                ->andReturn('hello');
        });

        $service = resolve(WhatHappned::class);
        $input = new ChatInput('hello world');

        $response = $service->execute($input);
        $this->assertEquals('hello', $response);
    }
}
