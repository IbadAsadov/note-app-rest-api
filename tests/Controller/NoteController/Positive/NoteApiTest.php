<?php


namespace Tests\Controller\NoteController\Positive;


use App\Models\Note;
use Tests\TestCase;

class NoteApiTest extends TestCase
{
    public function test_index()
    {
        $user = $this->user();

        $this->actingAs($user)->get(route('notes.index'))
            ->assertStatus(200);
    }

    public function test_store()
    {
        $user = $this->user();
        $formData = [
            'title' => 'test title',
            'text' => 'test text',
        ];

        $this->actingAs($user)->post(route('notes.store'), $formData)
            ->assertStatus(201);
    }

    public function test_show()
    {
        $user = $this->user();
        $note = Note::first();

        $this->actingAs($user)->get(route('notes.show', ["note" => $note->id]))
            ->assertStatus(200);
    }

    public function test_update()
    {
        $user = $this->user();
        $formData = [
            'title' => 'test title',
            'text' => 'test text',
        ];
        $note = Note::first();

        $this->actingAs($user)->put(route('notes.update', ["note" => $note->id]), $formData)
            ->assertStatus(200);
    }


    public function test_delete()
    {
        $user = $this->user();
        $note = Note::first();

        $this->actingAs($user)->delete(route('notes.destroy', ["note" => $note->id]))
            ->assertStatus(200);
    }

}
