@extends('layouts.app')

@section('title', $entry->title)

@section('content')
    <h1>{{ $entry->title }}</h1>
    <h2>{{ $entry->created_at }}</h2>

    <div>
    {{ $entry->body }}
    </div>

    <a href="{{ route('home') }}">
    < Back
    </a>
@endsection