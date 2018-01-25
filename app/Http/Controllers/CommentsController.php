<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entry;
use App\Comment;

class CommentsController extends Controller
{
    public function create(Request $request, $entry_id)
    {
        $user = \Auth::user();
        $entry = $user->entries()->findOrFail($entry_id);

        $validate = $request->validate([
            'body' => 'required|max:1024'
        ]);

        $comment = new Comment([
            'body' => $request->input('body')
        ]);

        $comment->entry()->associate($entry);
        $comment->user()->associate($user);
        $comment->save();

        return redirect(route('entries.show', ['entry' => $entry_id]));
    }
}
