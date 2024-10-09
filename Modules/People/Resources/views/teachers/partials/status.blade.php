@if ($data->teacher_active == '1')
    <span class="badge badge-success" style="font-size: 14px;">
        Active
    </span>
@elseif ($data->teacher_active == '2')
    <span class="badge badge-secondary" style="font-size: 14px;">
        Non Active
    </span>
@else
@endif
