<h1>All Entries</h1>

<a href="{{ route('new_entry') }}">
    Write new entry
</a>

<ul>
    @foreach($entries as $entry)
    <li>{{ $entry->title }}</li>
    @endforeach
</ul>