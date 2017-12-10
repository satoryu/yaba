<h3>Comments</h3>

@forelse ($entry->comments() as $comment)
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title"> {{ $comment->title }} </h4>
        </div>
        <div class="panel-body">
            {{ $comment->body }}
        </div>
    </div>
@empty
    <div class="well">
        No Comments
    </div>
@endforelse

<form class="form" method="POST" action="{{ route('post_comment', ['entry_id' => $entry->id]) }}">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="name">Name</label>
            <input name="name" class="form-control" type="text">
        </div>
        <div class="col-md-6 form-group">
            <label for="email">Email</label>
            <input name="email" class="form-control" type="email">
        </div>
    </div>

    <div class="form-group">
        <textarea class="form-control">
        </textarea>
    </div>

    <button type="submit" class="btn btn-success">Post</button>
</form>