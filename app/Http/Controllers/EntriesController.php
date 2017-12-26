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

    public function create() {
        $entry = new Entry;

        return view('entries.create', ['entry' => $entry]);
    }

    public function store(Request $request) {
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

    public function show($entry) {
        $entry = Entry::find($entry);

        if (is_null($entry)) {
            abort(404);
        }

        return view('entries.show', ['entry' => $entry]);
    }

    public function edit($entry) {
        $entry = Entry::find($entry);

        return view('entries.edit', ['entry' => $entry]);
    }

    public function update($entry, Request $request) {
        $entry = Entry::find($entry);

        $entry->title = $request->input('title');
        $entry->body = $request->input('body');
        $entry->save();

        return redirect(route('entries.show', ['entry' => $entry->id]));
    }

    public function destroy($entry) {
        $entry = Entry::find($entry);

        $entry->delete();

        return redirect(route('home'))->with(['status' => 'Successfully deleted.']);
    }
}
