@extends('layouts.app')

@section('title', 'New Entry')

@section('content')
  <form method="POST" action="{{ route('entries.store') }}">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" value="{{ $entry->title }}" required>
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="body" rows="15">{{ $entry->body }}</textarea>
    </div>

    <input class="btn btn-success" type="submit">
  </form>
@endsection