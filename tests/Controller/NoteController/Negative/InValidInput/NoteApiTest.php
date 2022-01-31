<?php


namespace Tests\Controller\NoteController\Negative\InValidInput;


use App\Models\Note;
use Tests\TestCase;

class NoteApiTest extends TestCase
{
    public function test_show()
    {
        $user = $this->user();
        $note = Note::getNewId();

        $this->actingAs($user)->get(route('notes.show', ["note" => $note]))
            ->assertStatus(404);
    }

    public function test_update()
    {
        $user = $this->user();
        $formData = [
            'title' => 'test title',
            'text' => 'test text',
        ];
        $note = Note::getNewId();

        $this->actingAs($user)->put(route('notes.update', ["note" => $note]), $formData)
            ->assertStatus(404);
    }


    public function test_delete()
    {
        $user = $this->user();
        $note = Note::getNewId();

        $this->actingAs($user)->delete(route('notes.destroy', ["note" => $note]))
            ->assertStatus(404);
    }
}
