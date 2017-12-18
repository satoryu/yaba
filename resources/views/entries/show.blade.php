@extends('layouts.app')

@section('title', $entry->title)

@section('content')
    @include('parts.entry', ['entry' => $entry, 'brief' => true])

    @include('comments', ['entry' => $entry])

    <a href="{{ route('home') }}">
    < Back
    </a>
@endsection