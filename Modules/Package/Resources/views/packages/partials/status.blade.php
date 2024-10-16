@if ($data->package_status == '1')
    <span class="badge badge-success" style="font-size: 14px;">
        Active
    </span>
@else
    <span class="badge badge-secondary" style="font-size: 14px;">
        Completed
    </span>
@endif
