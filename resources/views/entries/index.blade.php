@extends('layouts.app')

@section('title', 'All entries')

@section('content')
    @foreach($entries as $entry)
        <div class="media">
            <div class="media-left">
                <img src="{{ $entry->author->accounts->first()->avatar_url }}" alt="" width="40" class="media-object img-rounded">
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="{{ route('entries.show', ['entry' => $entry->id ]) }}">
                    {{ $entry->title }}
                    </a>
                </h3>
                by {{ $entry->author->name }} posted at {{ $entry->created_at_tz->diffForHumans() }}
            </div>
        </div>
    @endforeach
@endsection