<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entry;

class EntriesController extends Controller
{
    public function index() {
        $entries = Entry::getRecentEntries()->with('author.accounts')->get();

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

        $user = \Auth::user();

        $title = $request->input('title');
        $body = $request->input('body');

        $user->entries()->create([
            'title' => $title,
            'body' => $body
        ]);

        return redirect(route('entries.index'));
    }

    public function show($entry) {
        $entry = Entry::with('comments.user')->findOrFail($entry);

        return view('entries.show', ['entry' => $entry]);
    }

    public function edit($entry) {
        $user = \Auth::user();
        $entry = $user->entries()->findOrFail($entry);

        return view('entries.edit', ['entry' => $entry]);
    }

    public function update($entry, Request $request) {
        $user = \Auth::user();
        $entry = $user->entries()->findOrFail($entry);

        $entry->title = $request->input('title');
        $entry->body = $request->input('body');
        $entry->save();

        return redirect(route('entries.show', ['entry' => $entry->id]));
    }

    public function destroy($entry) {
        $user = \Auth::user();
        $entry = $user->entries()->findOrFail($entry);

        $entry->delete();

        return redirect(route('entries.index'))->with(['status' => 'Successfully deleted.']);
    }
}
