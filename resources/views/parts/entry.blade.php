<div class="entry">
    <div class="entry-header">
        <h2>
            <a href="{{ route('entry', ['id' => $entry->id]) }}">
                {{ $entry->title }}
            </a>
        </h2>
    </div>
    <div class="entry-body">
        {!! $entry->renderBody() !!}
    </div>
    <div class="entry-footer text-right">
        Posted at {{ $entry->created_at_tz }}
    </div>
</div>