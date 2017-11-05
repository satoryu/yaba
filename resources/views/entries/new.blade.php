<form method="POST" action="{{ route('create_entry') }}">
  {{ csrf_field() }}

  <label for="title">Title</label>
  <input type="text" name="title" value="{{ $entry->title }}" required>

  <label for="body">Body</label>
  <textarea name="body">
  {{ $entry->body }}
  </textarea>

  <input type="submit">
</form>