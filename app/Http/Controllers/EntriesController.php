<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entry;

class EntriesController extends Controller
{
    public function index() {
        $entries = Entry::getRecentEntries()->get();

        return view('entries.index', ['entries' => $entries]);
    }

    public function new() {
        $entry = new Entry;

        return view('entries.new', ['entry' => $entry]);
    }

    public function create(Request $request) {
        $validate = $request->validate([
            'title' => 'required|max:64',
            'body' => 'required'
        ]);

        $entry = new Entry;

        $entry->title = $request->input('title');
        $entry->body = $request->input('body');

        $entry->save();

        return redirect(route('home'));
    }

    public function show($id) {
        $entry = Entry::find($id);

        if (is_null($entry)) {
            abort(404);
        }

        return view('entries.show', ['entry' => $entry]);
    }
}
