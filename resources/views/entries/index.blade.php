@extends('layouts.app')

@section('title', 'All entries')

@section('content')
    <h1>All Entries</h1>

    <a href="{{ route('new_entry') }}">
        Write new entry
    </a>

    <ul>
        @foreach($entries as $entry)
        <li>
            <a href="{{ route('show_entry', ['id' => $entry->id]) }}">
                {{ $entry->title }}
            </a>
        </li>
        @endforeach
    </ul>
@endsection