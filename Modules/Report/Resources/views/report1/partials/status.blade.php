@if ($data->report1task_active == '1')
    <span class="badge badge-success" style="font-size: 14px;">
        Active
    </span>
@elseif ($data->report1task_active == '2')
    <span class="badge badge-primary" style="font-size: 14px;">
        Completed
    </span>
@else
    <span class="badge badge-secondary" style="font-size: 14px;">
        Non Active
    </span>
@endif
