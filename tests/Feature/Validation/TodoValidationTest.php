<?php

namespace Tests\Feature\Validation;

use Illuminate\Http\Response;
use Tests\TestCase;

class TodoValidationTest extends TestCase
{
    /**
     * @test
     */
    public function content_field_validation_in_store()
    {
        $response = $this->postJson(route('api.todos.store'));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonFragment([
            'message' => 'The given data was invalid.',
            'errors' => [
                'content' => [
                    'The content field is required.'
                ]
            ]
        ]);

        $cases = [
            '',
            str_random(256),
            123456
        ];
        
        foreach ($cases as $case) {
            $response = $this->postJson(route('api.todos.store'), [
                'content' => $case
            ]);

            $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

            $response->assertJsonStructure([
                'message',
                'errors' => [
                    'content' => []
                ]
            ]);
        }
    }
}
