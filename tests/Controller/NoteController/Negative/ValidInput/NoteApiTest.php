<?php


namespace Tests\Controller\NoteController\Negative\ValidInput;


use App\Models\Note;
use Tests\TestCase;

class NoteApiTest extends TestCase
{
    public function test_store()
    {
        $user = $this->user();
        $formData = [
            'title' => 'test title',
            'text' => [
                1
            ],
        ];

        $this->actingAs($user)->post(route('notes.store'), $formData)
            ->assertStatus(400);
    }

    public function test_update()
    {
        $user = $this->user();
        $formData = [
//            'title' => 'test title',
            'text' => 'test text',
        ];
        $note = Note::first();

        $this->actingAs($user)->put(route('notes.update', ["note" => $note->id]), $formData)
            ->assertStatus(400);
    }

}
