@if ($data->teacher_active == 'Active')
    <span class="badge badge-success" style="font-size: 13px;">
        {{ $data->teacher_active }}
    </span>
@elseif ($data->teacher_active == 'Non Active')
    <span class="badge badge-secondary" style="font-size: 13px;">
        {{ $data->teacher_active }}
    </span>
@else
@endif
