<div class="btn-group dropleft">
    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        {{-- @can('edit_purchases') --}}
            <a href="{{ route('kelas3-result.edit', $data->id) }}" class="dropdown-item">
                <i class="bi bi-pencil mr-2 text-warning" style="line-height: 1;"></i> Edit
            </a>
        {{-- @endcan
        {{-- @can('show_purchases') --}}
            <a href="{{ route('kelas3-result.show', $data->id) }}" class="dropdown-item">
                <i class="bi bi-eye mr-2 text-primary" style="line-height: 1;"></i> Show
            </a>
        {{-- @endcan --}}
    </div>
</div>
