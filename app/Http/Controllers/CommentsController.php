<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entry;
use App\Comment;

class CommentsController extends Controller
{
    public function create(Request $request, $entry_id)
    {
        $entry = Entry::find($entry_id);

        $comment = new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body
        ]);

        $entry->comments()->save($comment);

        return redirect(route('entry', ['id' => $entry_id]));
    }
}
