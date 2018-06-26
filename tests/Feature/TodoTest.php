<?php

namespace Tests\Feature;

use App\Todo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_get_all_todos()
    {
        factory(Todo::class, 20)->create();

        $response = $this->getJson(route('api.todos.index'));

        $response->assertJsonStructure([
            'data' => [
                'id',
                'content'
            ]
        ]);
    }
}
