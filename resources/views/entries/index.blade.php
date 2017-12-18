@extends('layouts.app')

@section('title', 'All entries')

@section('content')
    @foreach($entries as $entry)
        @include('parts.entry', ['entry' => $entry])
    @endforeach
@endsection