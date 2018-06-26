<?php

namespace Tests\Feature;

use App\Todo;
use Illuminate\Http\Response;
use Tests\TestCase;

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
                [
                'id',
                'content'
                ]
            ],
        ]);
    }

    /**
     * @test
     */
    public function it_can_store_new_todos()
    {
        $data = [
            'content' => 'Do more tests!'
        ];

        $response = $this->postJson(route('api.todos.store'), $data);

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'data' => [
                'id',
                'content'
            ],
            'message'
        ]);
    }

    /**
     * @test
     */
    public function it_can_delete_todos()
    {
        $todo = factory(Todo::class)->create();

        $response = $this->deleteJson(route('api.todos.destroy', $todo));

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('todos', ['id' => $todo->id, 'content' => $todo->content]);
    }
}
