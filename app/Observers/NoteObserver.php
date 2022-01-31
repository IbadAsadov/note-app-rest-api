<?php

namespace App\Observers;

use App\Models\Note;

class NoteObserver
{

    public function creating(Note $note) : void
    {
        $note->created_by = auth()->user()->id;
    }


    public function updating(Note $note) : void
    {
        $note->updated_by = auth()->user()->id;
    }


    public function deleting(Note $note) : void
    {
        $note->deleted_by = auth()->user()->id;
    }

}
