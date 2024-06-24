<?php

namespace Tests\Feature\Gemini;

use App\DTO\Gemini\ChatInput;
use App\UseCases\Gemini\ChatByPro;
use App\UseCases\Gemini\ChatInterface;
use Mockery\MockInterface;
use Tests\TestCase;

class getInformationTest extends TestCase
{
    public function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }


    public function test_gemini_what_happened_with_http(): void
    {
        $this->mock(ChatByPro::class,  function (MockInterface $mock) {
            $mock->shouldReceive('execute')
                ->once()
                ->andReturn('hello');
        });
        $request = [
            'text' => 'hello world'
        ];

        $response = $this->post('api/chat/information', $request)->assertOk();
        $this->assertEquals('hello', $response['result']);
    }
}
