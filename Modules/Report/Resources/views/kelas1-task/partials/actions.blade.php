<div class="btn-group dropleft">
    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        {{-- @can('edit_purchases') --}}
            <a href="{{ route('kelas1-task.edit', $data->id) }}" class="dropdown-item">
                <i class="bi bi-pencil mr-2 text-warning" style="line-height: 1;"></i> Edit
            </a>
        {{-- @endcan
        {{-- @can('show_purchases') --}}
            <a href="{{ route('kelas1-task.show', $data->id) }}" class="dropdown-item">
                <i class="bi bi-eye mr-2 text-primary" style="line-height: 1;"></i> Show
            </a>
        {{-- @endcan
        @can('delete_purchases') --}}
            {{-- <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy{{ $data->id }}').submit()
                }">
                <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('umroh-manifests.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                </form>
            </button> --}}

            <button id="delete" class="dropdown-item" onclick="
            // event.preventDefault();
            // if (confirm('Are you sure? It will delete the data permanently!')) {
            // document.getElementById('destroy{{ $data->id }}').submit()
            // }">
            <i class="bi bi-trash mr-2 text-secondary" style="line-height: 1;"></i> Delete
            {{-- <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('umroh-manifests.destroy', $data->id) }}" method="POST">
                @csrf
                @method('delete')
            </form> --}}
            </button>

        {{-- @endcan --}}
    </div>
</div>
