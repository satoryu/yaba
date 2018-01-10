<div class="entry">
    <div class="entry-header">
        <h2>
            <a href="{{ route('entries.show', ['entry' => $entry->id]) }}">
                {{ $entry->title }}
            </a>
        </h2>

        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-cog"></span>
                </button>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('entries.edit', ['entry' => $entry]) }}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#delete_dialog-{{ $entry->id }}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                    </li>
                </ul>
            </div>

            <div class="modal fade" id="delete_dialog-{{ $entry->id }}" tabindex="-1" role="dialog">
                <form method="POST" action="{{ route('entries.destroy', ['entry' => $entry]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                Are you sure to delete the entry '{{ $entry->title }}'?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-danger" value="Delete" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="entry-body">
        {!! $entry->renderBody() !!}
    </div>
    <div class="entry-footer text-right">
        Posted at {{ $entry->created_at_tz }}
    </div>
</div>