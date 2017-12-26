@extends('layouts.app')

@section('title', 'Edit Entry')

@section('content')
  <form method="POST" action="{{ route('entries.update', ['entry' => $entry]) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" value="{{ $entry->title }}" required>
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="body" rows="15">{{ $entry->body }}</textarea>
    </div>

    <input class="btn btn-success" type="submit" value="Update">
  </form>
@endsection