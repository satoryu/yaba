@extends('layouts.app')

@section('title', 'All entries')

@section('content')
    <h1>All Entries</h1>

    <a class="btn btn-primary" href="{{ route('new_entry') }}">
        <i class="glyphicon glyphicon-pencil"></i> Write new entry
    </a>

    <ul>
        @foreach($entries as $entry)
        <li>
            <a href="{{ route('entry', ['id' => $entry->id]) }}">
                {{ $entry->title }}
            </a>
        </li>
        @endforeach
    </ul>
@endsection