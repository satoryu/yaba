<h3>Comments</h3>

@forelse ($entry->comments()->get() as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"> {{ $comment->user->name }} said: </h4>
        </div>
        <div class="panel-body">
            {{ $comment->body }}
        </div>
        <div class="panel-footer text-right">
            posted at {{ $comment->created_at_tz }}
        </div>
    </div>
@empty
    <div class="well">
        No Comments
    </div>
@endforelse

<form class="form" method="POST" action="{{ route('post_comment', ['entry_id' => $entry->id]) }}">
    {{ csrf_field() }}

    <div class="form-group">
        <textarea name="body" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Post</button>
</form>